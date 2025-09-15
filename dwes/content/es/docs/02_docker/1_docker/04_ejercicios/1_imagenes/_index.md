---
title: "Crea imágenes"
linkTitle: "Imágenes"
weight: 10

icon: fa-regular fa-file-image
draft: false    
---


## __Descargar, ver y borrar imágenes__
* Comandos a usar
> ```shell
> docker pull
> docker images
> docker rmi nombre_imagen
> docker rmi (docker images)
> ```


##### __1. Descarga una imagen llamada  {{<color color="text-success">}}ubuntu_latest{{</color>}}__
>{{<form  solucion="docker pull ubuntu:latest">}}
{{</form>}}
> 
##### __2. Descarga una imagen llamada  {{<color color="text-success">}}manolo/web:v1{{</color>}}__
>{{<form  solucion="docker pull manolo/web:v1">}}
{{</form>}}
##### __3. Verficia que las has descargado listándolas__
>{{<form  solucion="docker images">}}
{{</form>}} 
##### __4. Borra la imagen llamada manolo/web:v10__
>{{<form  solucion="docker rmi manolo/web:v10">}}
{{</form>}}
##### __5. Verifica que la has borrado__
>{{<form  solucion="docker images">}}
{{</form>}}
##### __6. Vuelve a cargar una imagen llamada  manolo/web:v10__
>{{<form  solucion="docker pull manolo/web:v1">}}
{{</form>}}
##### __7. Borra todas las imágemes__
>{{<form  solucion="docker rmi (docker images)">}}
{{</form>}}
##### __8. Verifica que no tienes ninguna imagen__
>{{<form  solucion="docker images">}}
{{</form>}}
