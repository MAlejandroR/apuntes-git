---
title: "Contenedores e imágenes"
linkTitle: "Entornos"
weight: 20
icon: "fa-regular fa-box"
draft: false    
---

## Contenedores e imágnes
{{< imgproc Contenedor_vs_img  Fill "600x350" >}}



{{< /imgproc >}}
### La imagen

> **{{<color_blue >}}La imagen{{</color_blue>}} es un fichero que contiene todo el conjunto de librerías, dependencias y configuraciones necesarias para ejecutar un entorno aislado, con servicios y procesos, junto con su propia IP, y que servirá como base para crear uno o varios contenedores.**

{{%line%}} 
 
{{< imgproc Imagen Fill "611x812" >}}

{{< /imgproc >}}

{{< alert title="Notas" color="primary" >}}
No se emula hardware, sino únicamente servicios y software (como el sistema de archivos, el sistema operativo y los servicios). Por lo tanto, un contenedor no es una máquina virtual, aunque tenga su propia IP. Sin embargo, puede considerarse como un dispositivo o nodo independiente dentro de la red.

{{< /alert >}}
{{< alert title="Notas" color="primary" >}}
Para tener una idea general, podríamos compararlo con una ISO de instalación de un sistema operativo. Sin embargo, la imagen Docker no instala un sistema operativo completo, sino que contiene únicamente lo necesario para ejecutar aplicaciones en un entorno aislado.
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