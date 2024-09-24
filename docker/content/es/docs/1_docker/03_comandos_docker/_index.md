---
title: "Docker Prácticas"
linkTitle: "comandos"
weight: 30
menu:
  main:
    weight: 20
icon: fa-solid fa-terminal
draft: false    
---

{{% pageinfo %}}
#### __:star: Comandos__  
 Repaso de __comandos__ usados en __docker__ en __línea de comados__
{{% /pageinfo %}}


{{% pageinfo %}}

#### Descargando imágenes
> __pull__ 
>>  Obtener en local una imagen llamada __ubuntu:latest__::
```bash
    docker pull ubunut:latest
```
{{% /pageinfo %}}


{{% pageinfo color="primary" %}}
####  Visualizar imágenes en local
> __images__
>> Listar todas las imágenes del sistema
```bash
docker images
```
{{% /pageinfo %}}

{{% pageinfo color="primary" %}}
####  Buscar imágenes
>__docker search__
>>Buscar todas las imágenes que contengan ubuntu cuya distribución empiece por 1
```bash
docker search ubuntu:1
```
{{% /pageinfo %}}


{{% pageinfo color="primary" %}}
#### Crear  un __contenedor__

{{< alert title="docker create" color="warning" >}}

Hay varios comandos para crear contenedores

El comando **create** tiene varias opciones, pero no lo vamos a utilizar nosotras.

No obstante lo comento es este post
{{< /alert >}} 

>__docker create__
>> Crea un contenedor basado en la imagen __ubuntu:latest__
```bash
docker create ubuntu:latest
```
***
##### Crearlo vinculándolo al terminal
>__docker create -t__
>> Crea un contenedor que quede vinculado a un terminal __tty__
```bash
    docker create -t ubuntu:latest
```
***
##### Nombrar el contenedor
>__docker create  --name__
>> Crear un contenedor llamado __web__ a partir de la imagen ubuntu:latest y vincúlalo al terminal
```bash
    docker create --name web -t ubuntu:latest
```
####  Creando comandos para interactuar en un terminal
>__docker create -t -i__
>>Crear un contenedor llamada web para interactuar y luego ejecuta un bash _(Este comando ejecuta un intérprete de comandos de un sistema operativo)_
```bash
 docker rm web
 docker create --name web -t -i ubuntu:latest
 docker start web
 docker exec -ti bash
```
{{< alert title="Revisa" color="warning" >}}
Antes de crear el contenedor lo borramos     
Antes de ejectuar algo, lo tenemos que arrancar     
En este caso el comando start lo deja en estado up, ya que el contenedor fue coreado con __-i__  y __-t__   
{{< /alert >}}

{{% /pageinfo %}}



{{<line />}}

{{% pageinfo color="primary" %}}
#### Crear un contenedor con run
>__run__
>> Este es uno de los comandos que más vamos a utilizar
Es un comando que tiene muchas opciones, puedes verlas con el comando help
```bash
 docker help run
```
Nosotros lo vamos a usar comos se muestra a continuación
{{< imgproc run Fill "1000x300" >}}

{{< /imgproc >}}


{{% /pageinfo %}}

{{% pageinfo color="primary" %}}
####  Listar todos  los contenedores
>__docker ps -a__
>> Lista todos los contenedores que tenemos en el sistema
```bash
docker ps -a
```
####  Listar los contenesores arrancados
>__docker ps __
>> Lista todos los contenedores en estado Up
```bash
docker ps 
```
{{% /pageinfo %}}
{{< alert title="Prueba" color="warning" >}}
Si no ponemos __-a__ que viene de __all__ solo nos mostrará los contenedores que actualmente tenemos arrancados (en estado Up)
{{< /alert >}}
{{<line />}}
{{% pageinfo color="primary" %}}
#### Parar un contenedor
>__stop__
>> Para un contenedor (previamente creado)
```bash
 docker start web
```
{{% /pageinfo %}}

{{<line />}}
{{% pageinfo color="primary" %}}
#### Estados de un contenedor
>__Un contenedor está en uno de los siguientes estados__
{{< imgproc estados Fill "1200x600" >}}

{{< /imgproc >}}
{{% /pageinfo %}}




{{% pageinfo color="primary" %}}
#### Arrancar el contenedor web 
>__start__
>> Arranca un contenedor (previamente creado)
```bash
 docker start web
```
{{% /pageinfo %}}
{{% pageinfo color="primary" %}}
####  Ejecutar un comando en un contenedor
__:star: El contenedor tiene que estar en estado Up__
>__exec__
>> Ejecuta en un contenedor previamente creado llamado __web__ el comando ls _(Este comando muestra un listado de ficheros del contenedor)_
```bash
    docker exec -ti  web ls
```
{{% /pageinfo %}}
{{<line />}}



{{% pageinfo color="primary" %}}
####  Crear un contenedor que ejecute una instrucción: ls
* El contenedor se crea a partir de la imagen __ubuntu:latest__
* La instrucción que queremos ejecutar es ls
>__docker run__
```bash
 docker run  ubuntu:latest ls
```
####  Crear un contenedor, dejarlo arrancado  ejecuta una instrucción: bash
* El contenedor queremos que deje abierta un terminal para interactuar con el  bash
>__docker run__
```bash
 docker run  -ti ubuntu:latest bash
```
{{% /pageinfo %}}
{{< alert title="Importante" color="warning" >}}
> Entiende bien las opciones
> -ti se pone para que se quede abierto el terminal que está ejecutando el __bash__
{{< /alert >}}
{{% pageinfo color="primary" %}}
#### Crando un contenedor con run y que tenga nombre  
>__docker run --name__
>> Crea un contenedor llamado web y deja abierto un bash 
```bash
    docker rm web 
    docker run -ti --name web ubuntu:latest bash    
```
{{% /pageinfo %}}
{{< alert title="Cuidado" color="warning" >}}
Si intentamos crear un contenedor cuyo nombre ya exista nos dará un error.
En este 
{{< /alert >}}
{{<line />}}

{{% pageinfo color="primary" %}}
#### Forward de puertos 
{{< imgproc puertos Fill "1000x800" >}}

{{< /imgproc >}}
>__docker run -p XXXX:XXXX__
>> Crea un contenedor llamado web, abriendo un terminal y mapea el puerto 8000 del anfitrión al 80 del contenedor
```bash
 docker rm web 
 docker run -ti --name web  -p 8000:80 ubuntu:latest bash
```
{{% /pageinfo %}}
{{% pageinfo color="primary" %}}
{{< imgproc volumenes Fill "800x500" >}}

{{< /imgproc >}}
#### Compartiendo carpetas
>__docker run -v c:\carpeta_origen:/var/www/html__
>> Crea un contenedor llamado __web__, abriendo un terminal y comparte la carpeta del directorio actual llamada __app__ con la carpeta del docker ubicada en __/var/www/html__. Mapea los puertos anteriores
```bash
 docker rm web 
 docker run -ti --name web -p 8000:80  -v .\app:/var/www/html ubuntu:latest  bash
```
{{% /pageinfo %}}
{{< alert title="Warning" color="warning" >}}
 * Cuidado con la barra de separacion de carpetas o directorios __(en windows "\", en linux "/")__
   * Si la carpeta no existe la crea
{{< /alert >}}
{{<line />}} 
{{% pageinfo%}}
#### Creando una imagen a partir de un contenedor
>__docker commit__
 
>> Para crear una imagen a partir de un contenedor, este debe estar detenido. 
>> * La imagen que creemos incluirá todo lo que hayamos configurado dentro del contenedor.     
>> * El contenido de los volúmenes compartidos no se guarda en la imagen, ya que estos se cargan desde la carpeta compartida por el anfitrión.
>> * La forma de referenciar una imagen, el nombre que le pongamos en este caso,  siempre será con su nombre y tag (separados por dos puntos),lo que nos permitirá crear diferentes versiones (mismo nombre, diferente tag).
```bash
 docker commit nombre_contenedor nombre_imagen:tag 
```
{{% /pageinfo %}}

{{% pageinfo%}}
#### Login en Docker Hub
**docker login**

>>Permite autenticarse en Docker Hub para poder interactuar con los repositorios de imágenes.  
>Se utiliza para subir, descargar o gestionar imágenes desde la cuenta de Docker Hub.  
>Solicita las credenciales de acceso (usuario y contraseña).  
```bash
docker login
```
{{< alert title="Nota" color="warning" >}}
>Este comando es necesario para poder hacer un push de imágenes a Docker Hub.
> Tras ejecutar docker login, se te solicitará el nombre de usuario y la contraseña.
{{< /alert >}}
{{% /pageinfo%}}
{{% pageinfo%}}
#### Subir una imagen a Docker Hub 
**docker push**
>>Sube una imagen local a un repositorio en Docker Hub.
>Debes estar autenticado en Docker Hub (previamente con docker login).
>La imagen debe estar correctamente etiquetada con el formato <usuario>/<nombre_imagen>:<tag>.
```bash
docker push usuario/nombre_imagen:tag
```
##### Ejemplos:
````bash
docker push miusuario/miapp:v1.0
docker push miusuario/miapp:latest
````
{{< alert title="Nota" color="warning" >}}
> El comando docker **push** requiere que la imagen esté etiquetada con el nombre del usuario de Docker Hub.
> tag puede ser cualquier etiqueta que se desee utilizar para versionar la imagen (latest, v1.0, etc.).
> Si no especificas un tag, Docker usará latest por defecto.
{{< /alert >}}

{{% /pageinfo%}}