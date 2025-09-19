---
title: "Contenedores e imágenes"
linkTitle: "Contenedores e imágenes"
weight: 20
icon: "fa  fa-box"
draft: false    
---

## Contenedores e imágnes
{{< imgproc Contenedor_vs_img  Fill "600x350" >}}
Imagen y contenedor en docker
{{< /imgproc >}}
### La imagen
{{<definicion title="la imagen">}}
{{< color_blue >}}La imagen{{</color_blue>}} es un archivo que contiene todas las librerías, dependencias y configuraciones necesarias para ejecutar un entorno aislado con sus propios servicios y procesos. Sirve como base para crear uno o varios contenedores, los cuales obtendrán configuraciones de red y direcciones IP independientes al momento de su creación.

{{</definicion>}}

{{%line%}}
 
{{< imgproc Imagen Fill "611x812" >}}

{{< /imgproc >}}

{{< alert title="Notas" color="primary" >}}
No se emula hardware, sino únicamente servicios y software (como el sistema de archivos, el sistema operativo y los servicios). Por lo tanto, un contenedor no es una máquina virtual, aunque tenga su propia IP. Sin embargo, puede considerarse como un dispositivo o nodo independiente dentro de la red.
{{< /alert >}}

### El contenedor

> El contenedor es una capa de lectura y escritura que se añade a una imagen, permitiendo interactuar con ella y ponerla en ejecución.
{{< imgproc container Fill "800x600" >}}
Imagen obtenida de https://iesgn.github.io/curso_docker_2021/sesion2/organizacion.html
{{< /imgproc >}}
{{< alert title="Notas" color="primary" >}} El contenedor se crea a partir de una imagen y siempre dependerá de ella. Esto significa que no podremos eliminar la imagen mientras exista un contenedor asociado a ella. {{< /alert >}}

{{< alert title="Notas" color="primary" >}} El contenedor almacena los cambios realizados sobre la imagen, funcionando como pequeños incrementos sobre un archivo base. Este enfoque lo convierte en un sistema muy robusto, ágil y ligero. {{< /alert >}}

### Contenedor e imagen
{{% pageinfo%}}
#### 
**La unión hace la fuerza**   

El funcionamiento de Docker se basa en crear un contenedor a partir de una imagen, por lo que los conceptos de imagen y contenedor están intrínsecamente relacionados (no se pueden usar de manera individual).

{{< alert title="Nota" color="primary" >}} 
Todo contenedor siempre dependerá de una única imagen. {{< /alert >}}

{{< alert title="Nota" color="primary" >}}
Una imagen puede ser la base de uno o muchos contenedores. 
Cada contenedor es un sistema independiente de los demás, con su propia IP y un entorno completamente aislado. {{< /alert >}}

{{< imgproc join_img_container Fill "800x200" >}}

{{< /imgproc >}}

{{% /pageinfo%}}

### Compentes de la arqutectura docker
{{< imgproc arquitectura_docker Fill "1359x901" >}}

{{< /imgproc >}}
Descripcion de la imagen
<h3>{{< color >}} Cliente de Docker: {{< /color >}}</h3>

>* {{< color >}}Docker CLI{{< /color >}} permite ejecutar comandos para interactuar con Docker, 
>*  {{< color >}}Docker Compose{{< /color >}}** se utiliza para definir y manejar aplicaciones de múltiples contenedores.      
>* {{< color >}}Docker Engine{{< /color >}} Envía comandos  al motor de Docker para su ejecución.

<h3>{{< color >}}Docker Engine:{{< /color >}}</h3>

> Compuesta por {{< color >}}Docker Engine API{{< /color >}} y{{< color >}}Docker daemon{{< /color >}},los cuales  son componentes fundamentales del motor de Docker.
>*{{< color >}}Docker Engine API{{< /color >}} es la interfaz de comunicación entre el cliente y el motor.
>*{{< color >}}Docker daemon{{< /color >}}gestiona los contenedores y las imágenes.
>>Podemos ver en la imagen,  áreas para {{< color >}}imágenes{{< /color >}} y {{< color >}}contenedores{{< /color >}}, donde queda explícito que   Docker Engine se encarga de manejar tanto las imágenes como la ejecución de los contenedores.
>>* {{< color >}}Container Runtime{{< /color >}} es el entorno en el que los contenedores se ejecutan.


<h3> {{< color >}} Docker Registry: {{< /color >}}</h3>

> {{< color >}}Docker Register API{{< /color >}}** y {{< color >}}Repositorio de imágenes{{< /color >}}, que podemos considerar componentes esperados en esta sección.
>* {{< color >}}Docker Registry{{< /color >}}** es el servicio para almacenar y distribuir imágenes de contenedores, siendo {{< color >}} Docker Hub {{< /color >}} es un ejemplo de un registro público.
>* {{< color >}}Repositorio de imágenes {{< /color >}} muestra en su relación con {{< color >}} Docker Engine {{< /color >}} quien puede extraer y subir imágenes  este repositorio 
