---
title: "Https"
linkTitle: "Https y certificados"
weight: 30
date: 2024-12-18
icon: fas fa-key
draft: false
---
{{<referencias>}}
https://aws.amazon.com/es/what-is/ssl-certificate/

{{</referencias>}}


## Configuración de HTTP, HTTPS y Certificados SSL en Apache

**Apache** permite configurar servidores web para admitir  **conexiones HTTP y HTTPS**. 

La configuración de **HTTPS** requiere el uso de **certificados SSL/TLS _protocolo (Secure Socket Layers/ Transport Layer Aecurity)_**, que garantizan una comunicación segura mediante cifrado.

---

### 1. **Diferencia entre HTTP y HTTPS**

- **HTTP (HyperText Transfer Protocol)**:
	- Es un protocolo no cifrado.
	- Las comunicaciones entre el cliente y el servidor viajan con el texto tal cual se envía y se podrían capturar y ver por un tercero.
	- Se utiliza para sitios web que no manejan información sensible.

- **HTTPS (HyperText Transfer Protocol Secure)**:
	- Es una versión segura de HTTP que utiliza los protocolos SSL/TLS para cifrar las comunicaciones.
	- SSL/TLS son protocolos que garantizan la confidencialidad, integridad y autenticación de las comunicaciones.
	- Para establecer una conexión HTTPS, se necesita un certificado digital válido (emitido por una autoridad certificadora, CA), también llamado **certificado SSL/TLS** que permita la autenticación del servidor y la negociación de claves seguras.
  
 ### Las características
Las características de una página web protegida por SSL/TLS son las siguientes:

* **Un ícono de candado** y una barra de direcciones verde en el navegador web
* **Un prefijo https** en la dirección del sitio web del navegador
* **Un certificado SSL/TLS válido**. Puede comprobar si el certificado SSL/TLS es válido haciendo clic y expandiendo el ícono del candado en la barra de direcciones URL
* Una vez establecida la conexión cifrada, **solo el cliente y el servidor web** pueden ver los datos que se envían.
 
---

### 2. **Pasos para configurar HTTPS en Apache**

#### Paso 1: Activar el módulo SSL

Habilita el módulo SSL en Apache:
{{< highlight bash "linenos=table" >}}
sudo a2enmod ssl
sudo systemctl restart apache2
{{< /highlight >}}

#### Paso 2: Crear o instalar un certificado SSL

1. **Crear un certificado autofirmado (solo para pruebas):**
   {{< highlight bash "linenos=table" >}}
   sudo openssl req -x509 -nodes -days 365 -newkey rsa:2048 \
   -keyout /etc/ssl/private/apache-selfsigned.key \
   -out /etc/ssl/certs/apache-selfsigned.crt
   {{< /highlight >}}

2. **Usar un certificado emitido por una CA (recomendado):**
	- Solicita un certificado SSL/TLS de una autoridad certificadora como Let's Encrypt, DigiCert, o Comodo.
	- Puedes usar herramientas como `certbot` para automatizar este proceso:
	  {{< highlight bash "linenos=table" >}}
	  sudo apt install certbot python3-certbot-apache
	  sudo certbot --apache
	  {{< /highlight >}}

#### Paso 3: Configurar Apache para HTTPS

Edita el archivo de configuración del sitio web en `/etc/apache2/sites-available/mi-sitio.conf`:
{{< highlight apache "linenos=table" >}}
<VirtualHost *:80>
ServerName example.com
Redirect permanent / https://example.com/
</VirtualHost>

<VirtualHost *:443>
ServerName example.com
DocumentRoot /var/www/html

    SSLEngine On
    SSLCertificateFile /etc/ssl/certs/apache-selfsigned.crt
    SSLCertificateKeyFile /etc/ssl/private/apache-selfsigned.key

    <Directory /var/www/html>
        AllowOverride All
    </Directory>
</VirtualHost>
{{< /highlight >}}
- **`Redirect permanent`**: Redirige todo el tráfico HTTP al puerto HTTPS.
- **`SSLEngine On`**: Habilita SSL/TLS.
- **`SSLCertificateFile` y `SSLCertificateKeyFile`**: Especifican las rutas a los archivos del certificado y la clave privada.

#### Paso 4: Reiniciar Apache

Reinicia el servidor para aplicar los cambios:
{{< highlight bash "linenos=table" >}}
sudo systemctl restart apache2
{{< /highlight >}}

---

### 3. **Redirigir HTTP a HTTPS automáticamente**

Configura una redirección en el archivo `.htaccess`:
{{< highlight apache "linenos=table" >}}
RewriteEngine On
RewriteCond %{HTTPS} off
RewriteRule ^(.*)$ https://%{HTTP_HOST}/$1 [L,R=301]
{{< /highlight >}}

---

### 4. **Verificar la configuración**

1. Accede a tu dominio usando `https://` y asegúrate de que la conexión es segura.
2. Utiliza herramientas como [SSL Labs](https://www.ssllabs.com/) para analizar la configuración SSL/TLS.

---

### Notas adicionales

- **Renovación automática de certificados**: Si usas Let's Encrypt, configura un cron job para renovar los certificados automáticamente:
  {{< highlight bash "linenos=table" >}}
  sudo certbot renew --quiet
  {{< /highlight >}}

- **Seguridad adicional**: Configura encabezados HTTP como `Strict-Transport-Security` para reforzar HTTPS:
  {{< highlight apache "linenos=table" >}}
  Header always set Strict-Transport-Security "max-age=31536000; includeSubDomains"
  {{< /highlight >}}
