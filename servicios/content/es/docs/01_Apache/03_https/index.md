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
https://letsencrypt.org/es/getting-started/
https://www.ssllabs.com/index.html
{{</referencias>}}


## HTTP, HTTPS y Certificados SSL en Apache

**Apache** permite configurar servidores web para admitir  **conexiones HTTP y HTTPS**.
Sus siglas se corresponden con **Hypertext Transfer Protocol Secure** lo que ya indica que añade seguridad a HTTP. 

En realidad, no es un protocolo propio, sino que se basa en introducir una capa con el protocolo SSL/TLS entre la capa de transporte y la capa de aplicación en el conjunto de protocolos TCP/IP. Mediante el uso de SSL/TLS, HTTPS consigue que la comunicación en la web sea segura.

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
    - SSL/TLS, se utiliza para asegurar **confidencialidad, autenticidad, integridad y no repudio** entre el cliente y el servidor:
      - **Confidencialidad**: La confidencialidad se entiende en el ámbito de la seguridad informática, como la protección de datos y de información intercambiada entre un emisor y uno o más destinatarios frente a terceros.
      - **Integridad**: Es la propiedad que busca mantener los datos libres de modificaciones no autorizadas.
      - **Autenticación o autentificación**: Propiedad que permite identificar el generador de la información.
      - **No repudio**: Propiedad que prueba que el autor envió la comunicación (no repudio en origen) y que el destinatario la recibió (no repudio en destino)


	- Para establecer una conexión HTTPS, se necesita un certificado digital válido (emitido por una autoridad certificadora, CA), también llamado **certificado SSL/TLS** que permita la autenticación del servidor y la negociación de claves seguras.
    
### Las características
Las características de una página web protegida por SSL/TLS son las siguientes:

* **Un ícono de candado** y una barra de direcciones verde en el navegador web
* **Un prefijo https** en la dirección del sitio web del navegador
* **Un certificado SSL/TLS válido**. Puede comprobar si el certificado SSL/TLS es válido haciendo clic y expandiendo el ícono del candado en la barra de direcciones URL
* Una vez establecida la conexión cifrada, **solo el cliente y el servidor web** pueden ver los datos que se envían.

Una transacción segura SSL de manera simplificada sigue el siguiente modelo:

1. Primero, el cliente se conecta al servidor comercial protegido por SSL y pide la autenticación. El cliente también envía la lista de los criptosistemas que soporta, clasificada en orden descendente por la longitud de la clave.
2. El servidor que recibe la solicitud envía un certificado al cliente que contiene la clave pública del servidor firmado por una entidad de certificación (CA), y también el nombre del criptosistema que está más alto en la lista de compatibilidades
2. El cliente verifica la validez del certificado, luego crea una clave secreta al azar, cifra esta clave con la clave pública del servidor y envía el resultado al servidor (clave de sesión).
3. El servidor es capaz de descifrar la clave de sesión con su clave privada. De esta manera, hay dos entidades que comparten una clave que sólo ellos conocen. Las transacciones restantes pueden realizarse utilizando la clave de sesión, garantizando la integridad y la confidencialidad de los datos que se intercambian.
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

{{< alert title="Certificados usados" color="success" >}}
Dichos certificados “de aceite de serpiente” (Wikipedia: Snake oil (cryptography)) los genera el script de postinstalación del paquete ssl-cert de Ubuntu asociados al hostname del sistema.
{{< /alert >}}

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
