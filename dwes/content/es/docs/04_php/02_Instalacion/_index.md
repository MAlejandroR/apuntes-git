+++
title = 'Instalación'
date = 2024-10-15T07:04:49+02:00
draft = false
icon = "fas fa-download"
weight = 20
+++

### Instalando en Ubuntu

* En un sistema Ubuntu, puedes instalar Apache y PHP utilizando los siguientes comandos:

{{< color >}}Actualizar los repositorios: {{< /color >}}

{{< highlight php "linenos=table, hl_lines=1" >}}
#Actualizar repositorios
sudo apt update
#Instalar Apache2
sudo apt install apache2
#Instalar php y el módulo de php para apache 
sudo apt install php libapache2-mod-php

{{< / highlight >}}
Depué de realizar estas tareas, debes de resetear apache para ponerlo todo en funcionamiento
{{< highlight php "linenos=table, hl_lines=1" >}}
sudo systemctl restart apache2

{{< / highlight >}}

### Instalando en Windows con XAMPP

XAMPP es una solución sencilla para tener Apache, PHP, y MySQL en Windows. Sigue estos pasos para instalarlo:

{{< color >}}Descargar XAMPP {{< /color >}}
Ve al sitio web oficial de XAMPP [https://www.apachefriends.org](https://www.apachefriends.org) y descarga la versión que incluye PHP.

{{< color >}}Instalar XAMPP{{< /color >}}
Ejecuta el instalador y sigue las instrucciones. Asegúrate de seleccionar Apache y PHP durante la instalación.

{{< color >}} Iniciar los servicios {{< /color >}}:
Abre el panel de control de XAMPP y asegúrate de iniciar Apache.

{{< color >}}Comprobar instalación{{< /color >}}
Abre tu navegador y visita `http://localhost/`. Deberías ver la página de bienvenida de XAMPP.

### Creación de docker 

* Es esta la solución que vamos a utilizar.
* Para ello crearemos un {{< color >}} docker-compose.yaml {{< /color >}}, que nos levante un servicio con php y apache2.
* Por si queremos realizar modificaciones sobre la imagen original, la imagen la vamos a crear a patir de un {{< color >}} Dockerfile {{< /color >}}
* Cada proyecto que creemos o bien tendremos esta estructura, o bien los crearemos todos a partir de la carpeta compartida
 
{{< imgproc docker_folder Fill "230x87" >}}

{{< /imgproc >}}

{{% line %}}  

El contenido de los ficheros:

{{< highlight docker "linenos=table, hl_lines=2 3 4 5 8" >}}
services:
    web:
        build : .
        ports:
            - 8800:80
        volumes:
            - ./../app:/var/www/html
        container_name: web
{{< / highlight >}}

{{< alert title="Info" color="warning" >}}
* Creamos el servicio (contenedor ) ***web***
* A partir del **Dockerfile** que tenemos en **la misma carpeta**
* Proyectamos el puerto **8800** para acceder a él
* Mapeamos la carpeta **./../app** para escribir nuestros programas
{{< /alert >}}

El Dockerfile 
{{< highlight php "linenos=table, hl_lines=1" >}}
FROM php:8.3-apache
ENV DEBIAN_FRONTEND=noninteractive
RUN apt update
# Usa la imagen base de PHP con Apache

# Añadir o modificar la configuración de Apache para listar directorios si no hay index
RUN echo '<Directory /var/www/html>' >> /etc/apache2/apache2.conf
RUN echo 'Options +Indexes' >> /etc/apache2/apache2.conf
RUN echo '</Directory>' >> /etc/apache2/apache2.conf

# Exponer el puerto 80
EXPOSE 80
{{< / highlight >}}

La imagen de la estructura la podríamos organizar de la siguiente manera
{{< imgproc estructura_docker Fill "504x297" >}}

{{< /imgproc >}}