---
title: "Servicios Web con Apache"
linkTitle: "Apache"
weight: 60
date: 2024-12-18
description: >
  Aprendemos a instalar, configurar y personalizar Apache para implementar servicios web efectivos.
icon: fas fa-server
draft: false
---

{{< objetivos sub_title="Configuración de Apache" >}}
En este tema exploraremos cómo instalar, configurar y personalizar Apache, destacando las siguientes funcionalidades:

- {{< color >}}Hosts Virtuales{{< /color >}}
- {{< color >}}Opciones de Directorio{{< /color >}}
- {{< color >}}Alias{{< /color >}}
- {{< color >}}Autenticación en el servidor{{< /color >}}
- {{< color >}}Páginas dinámicas{{< /color >}}
- {{< color >}}SSL{{< /color >}}

Concluiremos con ejemplos prácticos para asegurar su correcta implementación.
{{< /objetivos >}}

{{% line %}}

### Instalación

Para instalar Apache en sistemas basados en Debian/Ubuntu:

{{< highlight dockerfile "linenos=table, hl_lines=1" >}}
sudo apt update
sudo apt install apache2
{{< /highlight >}}

Después de la instalación, verifica el estado del servicio:

{{< highlight dockerfile "linenos=table" >}}
sudo systemctl status apache2
{{< /highlight >}}

### Archivos de configuración

Apache organiza su configuración en varios archivos:

- **/etc/apache2/apache2.conf**: Archivo principal de configuración.
- **/etc/apache2/ports.conf**: Define los puertos en los que Apache escucha.
- **/etc/apache2/sites-available/**: Directorios para configuraciones específicas de sitios.
- **/etc/apache2/sites-enabled/**: Enlaces simbólicos a los sitios habilitados.

### Hosts Virtuales

Apache permite alojar múltiples sitios web mediante Hosts Virtuales. Estos pueden ser:

#### Basados en IP

{{< highlight dockerfile "linenos=table" >}}
<VirtualHost *:80>
DocumentRoot /var/www/misitio
</VirtualHost>
<VirtualHost *:8080>
DocumentRoot /var/www/otrositio
</VirtualHost>
{{< /highlight >}}

#### Basados en nombre

{{< highlight dockerfile "linenos=table" >}}
<VirtualHost *:80>
DocumentRoot /var/www/uno
ServerName www.unsitio.com
</VirtualHost>
<VirtualHost *:80>
DocumentRoot /var/www/otro
ServerName www.otrositio.org
</VirtualHost>
{{< /highlight >}}

Para gestionar los hosts, edita el archivo /etc/hosts o configura un DNS local.

### Opciones de Directorio

Configura permisos y propiedades para directorios específicos:

{{< highlight dockerfile "linenos=table" >}}
<Directory />
Options -Indexes
AllowOverride None
Order deny,allow
Deny from all
</Directory>
{{< /highlight >}}

### Alias

Los alias permiten "camuflar" directorios largos o fuera del DocumentRoot:

{{< highlight dockerfile "linenos=table" >}}
Alias /icons/ "/usr/local/apache2.4/icons/"
{{< /highlight >}}

### Autenticación

Configura autenticación básica para proteger secciones del sitio:

{{< highlight dockerfile "linenos=table" >}}
<Directory "/var/www/miweb/privado">
AuthUserFile "/etc/apache2/claves/passwd.txt"
AuthName "Acceso restringido"
AuthType Basic
Require valid-user
</Directory>
{{< /highlight >}}

Genera el archivo de contraseñas con `htpasswd`:

{{< highlight dockerfile "linenos=table" >}}
htpasswd -c /etc/apache2/claves/passwd.txt usuario
{{< /highlight >}}

### Páginas dinámicas

Para añadir soporte PHP:

{{< highlight dockerfile "linenos=table" >}}
sudo apt install php libapache2-mod-php
sudo systemctl restart apache2
{{< /highlight >}}

### SSL

Habilita comunicaciones seguras con SSL:

{{< highlight dockerfile "linenos=table" >}}
sudo a2enmod ssl
sudo systemctl restart apache2
{{< /highlight >}}

Configura un VirtualHost para SSL:

{{< highlight dockerfile "linenos=table" >}}
<VirtualHost *:443>
DocumentRoot /var/www/seguro
SSLEngine On
SSLCertificateFile /etc/ssl/certs/ssl-cert-snakeoil.pem
SSLCertificateKeyFile /etc/ssl/private/ssl-cert-snakeoil.key
</VirtualHost>
{{< /highlight >}}

### Referencias

{{< referencias icon_image="apache.png" title="Documentación de Apache" sub_title="Fuentes confiables" >}}

- [Guía oficial de Apache](https://httpd.apache.org/docs/)
- [Configuración de Hosts Virtuales](https://httpd.apache.org/docs/2.4/vhosts/)
- [Módulo SSL en Apache](https://httpd.apache.org/docs/2.4/mod/mod_ssl.html)

{{< /referencias >}}
