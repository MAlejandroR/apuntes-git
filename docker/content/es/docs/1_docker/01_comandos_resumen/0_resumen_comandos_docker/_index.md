---
title: "Docker Prácticas"
linkTitle: "docker terminal"
weight: 10
menu:
  main:
    weight: 10
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
{{< alert title="Revisa" color="warning" >}}
En este caso no funcionará ya que el contenedor creado no está asociad a un terminal y trabajar de forma interactiva
{{< /alert >}}
{{<line />}}
{{% pageinfo color="primary" %}}
####  Creando comandos para interactuar en un terminal
>__docker create -t -i__
>>Crear un contenedor llamada web para interactuar y luego ejecuta un bash _(Este comando ejecuta un intérprete de comandos de un sistema operativo)_ 
```bash
 docker rm web
 docker create --name web -t -i ubuntu:latest
 docker start web
 docker exec -ti bash
```
{{% /pageinfo %}}
{{< alert title="Revisa" color="warning" >}}
 Antes de crear el contenedor lo borramos     
 Antes de ejectuar algo, lo tenemos que arrancar     
 En este caso el comando start lo deja en estado up, ya que el contenedor fue coreado con __-i__  y __-t__   
{{< /alert >}}
{{<line />}}

{{% pageinfo color="primary" %}}
####  Listar todos  los contenesores 
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
####  Crear un contenedor, dejarlo arrancado  ejecuta una instrucción: ls
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
Si intentamos crear un contenedor cuyo nombre ya exista nos dará un error
{{< /alert >}}
{{<line />}}

{{% pageinfo color="primary" %}}
#### Forward de puertos 
>__docker run -p XXXX:XXXX__
>> Crea un contenedor llamado web, abriendo un terminal y mapea el puerto 8000 del anfitrión al 80 del contenedor
```bash
 docker rm web 
 docker run -ti --name web ubuntu:latest -p 8000:80 bash
```
{{% /pageinfo %}}
{{% pageinfo color="primary" %}}
#### Compartiendo carpetas
>__docker run -v c:\carpeta_origen:/var/www/html__
>> Crea un contenedor llamado __web__, abriendo un terminal y comparte la carpeta del directorio actual llamada __app__ con la carpeta del docker ubicada en __/var/www/html__. Mapea los puertos anteriores
```bash
 docker rm web 
 docker run -ti --name web ubuntu:latest -p 8000:80  -v .\app:/var/www/html bash
```
{{% /pageinfo %}}
{{< alert title="Warning" color="warning" >}}
 * Cuidado con la barra de separacion de carpetas o directorios __(en windows "\", en linux "/")__
   * Si la carpeta no existe la crea
{{< /alert >}}
{{<line />}} 


