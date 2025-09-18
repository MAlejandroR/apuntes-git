---
title: "Contenedores"
linkTitle: "Container to images"
weight: 30

icon: fa-solid fa-trowel
draft: false    
---

## __Contenedores => imágenes__
{{% pageinfo color="primary" %}}
#### __:heavy_exclamation_mark: Como crear nuestras imágenes__ 
En esta sección realizaremos acciones para pasar crear __nuestras imágenes__ a partir de __contenedores__

Una imagen es la plantilla para un contenedor, y contiene un sistema de archivos con una determinada versión de sistema operativo a partir del sistema operativo del anfitrión, y una serie de programas o servicios que se han añadido  
La forma de construir una imagen es en capas, según le vamos añadiendo elementos.    
La idea es tener un contenedor según nuestra necesidad, y con él, crear una imagen  
  :
{{% /pageinfo %}}

* Comandos a usar

> ```shell
> docker commit
> docker push
> docker export
> docker import
> ```


#### __1. Crea una imagen llamada {{<color color="text-success">}}web:v1{{</color>}} a partir del conenedor {{<color color="text-success">}}web{{</color>}}__
>{{< alert title="Revisa" color="warning" >}}
 #### __:mag: verifica antes__
 1. Revisa que tienes ese contenedor creado en el ejercicio anterior
 2. En este ejercicio teníamos apache y php y tenemos realizado el forward del puerto 8000:80
> 
{{< /alert >}}
{{<form  solucion="docker stop web docker commit web web:v1">}}
{{</form>}}

#### __2. Verifica que has creado la imagen__

>{{<form  solucion="docker images">}}
{{</form>}}

#### __3. Crea con run, un contenedor, pero compartiendo una carpeta__
{{< alert title="Recuerda" color="warning" >}}
#### __:memo: Revisa los comandos__
* Mira la ayuda del comando run , revisa la opción __-v__
* La carpeta en local la crearemos en el directorio actual y la llamaremos __app__
* En el docker la carpeta serán __/var/www/html__ que es dónde apache va a ir buscar los recursos cuando se los soliciten su __DocumentRoot__
* Ten cuidado con el caracter de separar directorios, en windows es __"\\"__ en linux y mac es __"/"__ 
{{< /alert >}}

>{{<form  solucion="docker run -t -i -v .\app:/var/www/html web:v1 bash">}}
{{</form>}}

#### __4. Crear un fichero tar  llamado web.tar con el contenedor__
{{< alert title="Interesante" color="warning" >}}
__#####:star2: Puede ser que quieras tener tu imagen en un fichero__  
Con este comando vamos a crear un __fichero tar__ a partir de un __contenedor__    
El contenedor tiene que estar parado __stop__.  
Con la opción __-o__ especificamos el nombre del fichero __tar__   
Lo que se almacena  en el __fichero tar__ es __la imagen del contenedor__, es decir me guardo una image, luego cuando lo exporte, __exportaré __una imagen__ de la cual tendré que crear __un contenedor__  
__:memo: Muy interesante reflexionar y entender este pequeño escenario__
{{< /alert >}}
>{{<form  solucion="docker stop web docker export -o web.tar web">}}
{{</form>}}

 #### __5. Crea una imagen llamada {{<color color="text-success">}}web:v2{{</color>}} a partir del fichero {{<color color="text-success">}}web.tar{{</color>}}__
>{{<form  solucion="docker import web.tar web:v2">}}
{{</form>}}



#### __6. Confirma que lo has creado__

> {{<form  solucion="docker images">}}
 {{</form>}}

####  __7. Crea un contenedor llamado web2 a patir de la imagen web:v2__
{{< alert title="Warning" color="warning" >}}
* Realiza el forward de los puertos 8002:80 (seguramente el 8000 esté ocupado)  
* Mapea o crea el volumen de capetas .\app:/var/www/html
{{< /alert >}}
> {{<form  solucion="docker run -t -i -p 8002:80 -v .\app:/var/www/html web:v2 bash">}}
 {{</form>}}

####  __7. Hazte una cuenta en docker hub__
{{% pageinfo color="primary" %}}
* Conectate a docker hub  __https://hub.docker.com/__
* En __sign up__ te podrás registrar

{{% /pageinfo %}}
{{< imgproc dockerhub.png   Fit "1000x1000 center" >}}


{{</imgproc>}}
####  __7. Accede en línea de comandos a tu cuenta__
>{{<form  solucion="docker login">}}
{{</form>}}
####  __7. Sube la imagen web:v1 que tienes en tu sistema__
{{< alert title="Observación en la solución" color="warning" >}}
 :mag: En la solución he puesto el nombre que corresponde a mi namespace, que es el nombre de usuario de docker hub, __manolo__, para especificar en nameespace, cada una tendréis el vuetro propio.
{{< /alert >}}
>{{<form  solucion="docker push manolo/web:v1">}}
{{</form>}}



