---
title: "Fichero de ejecución para crear imágenes DockerFile"
linkTitle: "DockerFile"
weight: 50
icon: fa-solid fa-terminal
draft: false    
---
{{< definicion title="Dockerfile" icon="fas fa-file-alt" >}}
Un {{< color >}} Dockerfile {{< /color >}} es un fichero de texto que contiene una serie de instrucciones para crear una {{< color >}} imagen {{< /color >}}. 
<br />
Este fichero tiene un formato concreto y necesita al menos la instrucción {{< color >}} FROM {{< /color >}} para especificar la imagen base a partir de la cual construiremos nuestra imagen personalizada.
{{</ definicion >}}
{{< alert title="Para qué" color="success" >}}
> * La idea es que partiendo de una imagen  personalicemos la imagen quequeremos crear,
> 
> * Después, a partir de esta imagen, levantaremos el contenedor)
{{< /alert >}}
{{% line %}}

## Construcción del Dockerfile
![img_1.png](img_1.png)
Para ejecutar las instrucciones del Dockerfile, utilizamos el comando {{< color >}} docker build {{< /color >}}:

{{< highlight bash "linenos=table" >}}
docker build [OPTIONS] PATH | URL | -
{{< /highlight >}}

Podemos usar la opción {{< color >}} PATH {{< /color >}} para especificar la ubicación del Dockerfile. 

{{< color >}} Si el fichero tiene otro nombre {{< /color >}}, lo indicamos con la opción {{< color >}} -f {{< /color >}}.

{{% line %}}

## Instrucciones principales

- **FROM**: Establece la imagen base.
- **RUN**: Ejecuta comandos durante la construcción de la imagen.
- **CMD**: Especifica el comando predeterminado para el contenedor.
- **LABEL**: Añade metadatos a la imagen.
- **EXPOSE**: Define los puertos que se abrirán.
- **ENV**: Establece variables de entorno.
- **COPY** y **ADD**: Copian archivos al contenedor.
- **WORKDIR**: Define el directorio de trabajo.
- **VOLUME**: Crea un punto de montaje persistente.
- **ENTRYPOINT**: Establece el comando principal del contenedor.
- **ARG**: Declara argumentos para la construcción.

{{% line %}}

## Ejemplo: Imagen base (`FROM`)

{{< highlight dockerfile "linenos=table, hl_lines=1" >}}
FROM ubuntu:latest
{{< /highlight >}}

Esta instrucción es obligatoria y debe ser la primera, salvo comentarios o {{< color >}} ARG {{< /color >}}.

{{% line %}}

## Ejemplo: Ejecución de comandos (`RUN`)

### Instalación de paquetes
### Instalación de paquetes
> *Lo primero que debemos hacer es ejecutar {{< color >}} apt-get update {{< /color >}}, lo que actualiza las cabeceras de los repositorios para garantizar que los paquetes disponibles estén actualizados.*  
> *Observa que se utiliza la opción {{< color >}} -y {{< /color >}} para confirmar automáticamente las instalaciones, evitando la necesidad de interacción manual, {{< color >}} algo que no está permitido durante la construcción del contenedor {{< /color >}}.*

{{< highlight dockerfile "linenos=table" >}}
RUN apt-get update && apt-get install -y apache2
RUN apt-get install -y php git zip
{{< /highlight >}}


### Ejecución de scripts

{{< highlight dockerfile "linenos=table" >}}
RUN bash script.sh
{{< /highlight >}}

Cada instrucción {{< color >}} RUN {{< /color >}} genera una capa.

Modificar una capa afecta a las siguientes, por lo que conviene agrupar comandos para optimizar.

{{% line %}}

## Declaración de variables: `ENV` y `ARG`

### ENV

{{< highlight dockerfile "linenos=table" >}}
FROM ubuntu:latest
ENV USER=developer
RUN echo "Usuario actual: $USER"
{{< /highlight >}}

### ARG

{{< highlight dockerfile "linenos=table" >}}
ARG VERSION=latest
FROM ubuntu:$VERSION
RUN echo "Versión base: $VERSION"
{{< /highlight >}}

Construcción con argumentos personalizados:

{{< highlight bash "linenos=table" >}}
docker build --build-arg VERSION=20.04 -t mi_imagen .
{{< /highlight >}}
## Ejemplo: Personalización con `RUN`

Podemos ejecutar comandos de administración, instalación y scripts predefinidos:

{{< highlight dockerfile "linenos=table" >}}
RUN mkdir -p /var/www/app && chown -R www-data:www-data /var/www/app
RUN apt-get update && apt-get install -y composer
RUN composer install --no-scripts --no-autoloader
{{< /highlight >}}

{{% line %}}

## Práctica sugerida: Crear un Dockerfile

1. Partir de la imagen base `ubuntu:latest`.
2. Instalar los paquetes necesarios:
	- `apache2`
	- `vim`
	- `git`
	- `zip`

{{< highlight dockerfile "linenos=table" >}}
FROM ubuntu:latest
RUN apt-get update && apt-get install -y apache2 vim git zip
{{< /highlight >}}

{{% line %}}

## Declaración de variables: `ENV` vs `ARG`
![img_2.png](img_2.png)
Diferencias clave:
- **`ENV`**: Define variables accesibles dentro del contenedor en tiempo de ejecución.
- **`ARG`**: Define argumentos disponibles solo durante la construcción de la imagen.

### Ejemplo de uso: `ARG`

{{< highlight dockerfile "linenos=table" >}}
ARG VERSION=latest
FROM ubuntu:$VERSION
RUN echo $VERSION > version.txt
{{< /highlight >}}

Construcción personalizada:

{{< highlight bash "linenos=table" >}}
docker build --build-arg VERSION=18.10 -t web:v1 .
{{< /highlight >}}

### Ejemplo de uso: `ENV`

{{< highlight dockerfile "linenos=table" >}}
FROM ubuntu:latest
ENV USER=manuel
RUN echo "Usuario configurado: $USER"
{{< /highlight >}}

{{% line %}}

## Solución de problemas: Instalación de PHP

### Problema
Al instalar PHP, puede requerirse configurar la zona horaria (`tzone`), lo que interrumpe la construcción al no poder interactuar con el contenedor.
![img_3.png](img_3.png)
### Solución
Configurar el entorno en modo no interactivo:

{{< highlight dockerfile "linenos=table" >}}
ARG DEBIAN_FRONTEND=noninteractive
RUN apt-get update && apt-get install -y php libapache2-mod-php
{{< /highlight >}}

Configurar la zona horaria:

{{< highlight dockerfile "linenos=table" >}}
RUN ln -snf /usr/share/zoneinfo/Europe/Madrid /etc/localtime && \
echo "Europe/Madrid" > /etc/timezone
{{< /highlight >}}
{{% line %}}

## Etiquetas (`LABEL`)

Podemos agregar metadatos útiles a la imagen:

{{< highlight dockerfile "linenos=table" >}}
FROM ubuntu:latest
LABEL maintainer="example@example.com"
LABEL version="1.0"
LABEL description="Imagen personalizada para aplicaciones web"
{{< /highlight >}}

Ver etiquetas en el contenedor:

{{< highlight bash "linenos=table" >}}
docker inspect --format '{{.Config.Labels}}' container_name
{{< /highlight >}}

{{% line %}}

## Gestión de archivos: `COPY` y `ADD`

### Ejemplo: Crear usuarios desde un script

Archivos necesarios:
1. `usuarios.txt`:
   {{< highlight bash "linenos=table" >}}
   maria
   nives
   luis
   lourdes
   manuel
   {{< /highlight >}}

2. `crea_usuarios.sh`:
   {{< highlight bash "linenos=table" >}}
   while IFS= read -r line
   do
   useradd -m $line -p $line
   done < usuarios.txt
   {{< /highlight >}}

Dockerfile:

{{< highlight dockerfile "linenos=table" >}}
FROM ubuntu:latest
COPY crea_usuarios.sh /
ADD usuarios.txt /
RUN bash crea_usuarios.sh
{{< /highlight >}}

{{% line %}}

## Comandos: `CMD` y `ENTRYPOINT`

### `CMD`

{{< highlight dockerfile "linenos=table" >}}
CMD ["echo", "Hola desde Docker"]
{{< /highlight >}}

### `ENTRYPOINT`

{{< highlight dockerfile "linenos=table" >}}
ENTRYPOINT ["apachectl", "-D", "FOREGROUND"]
{{< /highlight >}}

Ambos comandos definen lo que ejecutará el contenedor al iniciarse.

{{% line %}}

## Volúmenes (`VOLUME`)

Definir un volumen para persistencia de datos:

{{< highlight dockerfile "linenos=table" >}}
FROM ubuntu:latest
VOLUME ["/data"]
{{< /highlight >}}

Uso con variables de entorno:

{{< highlight dockerfile "linenos=table" >}}
ENV WEB_DIR=/var/www/html
VOLUME $WEB_DIR
{{< /highlight >}}

{{% line %}}

## Directorio de trabajo (`WORKDIR`)

Definir el directorio predeterminado:

{{< highlight dockerfile "linenos=table" >}}
FROM ubuntu:latest
WORKDIR /var/www/html
COPY script.sh /
ENTRYPOINT bash script.sh
{{< /highlight >}}

{{% line %}}

## Exponer puertos (`EXPOSE`)

Definir puertos expuestos por el contenedor:

{{< highlight dockerfile "linenos=table" >}}
FROM ubuntu:latest
ENV WEB_PORT=80 MYSQL_PORT=3306
EXPOSE $WEB_PORT $MYSQL_PORT
{{< /highlight >}}

{{% line %}}

## Conclusión

{{< alert title="Resumen" color="green" >}}
- Sabemos crear imágenes personalizadas con Dockerfile.
- Sabemos usar instrucciones clave como `RUN`, `CMD`, `ENTRYPOINT` y más.
- Aprendimos a gestionar volúmenes y persistencia de datos.
- Configuramos variables de entorno y puertos expuestos.
- Sabemos subir y gestionar imágenes en Docker Hub.
  {{< /alert >}}
