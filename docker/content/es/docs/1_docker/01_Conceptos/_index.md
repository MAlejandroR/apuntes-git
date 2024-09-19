---
title: "Conceptos sobre docker"
linkTitle: "Conceptos generales"
weight: 10
icon: fa-solid fa-terminal
draft: false    
---

## Referencias en la web
{{% pageinfo%}}
#### 
****
* La mejor la oficial:
> https://docs.docker.com/engine/
* Artículo interesante de Mauricio Collados, donde he sacado ideas para este tema
> https://medium.com/ingenier%C3%ADa-en-tranqui-finanzas/una-gu%C3%ADa-no-tan-r%C3%A1pida-de-docker-y-kubernetes-933f5b6709df
* Curso gratuito de docker
> https://jgaitpro.com/p/introduccion-a-containers-en-docker
* Instalar contenedor en windows (ver minutos 6:10 - 9:21
> https://www.youtube.com/watch?v=9FoWrDx6n2k
{{% /pageinfo%}}

---



### Instalar Docker

* Referencia de la página web
https://docs.docker.com/install
> Para ubuntu
 https://docs.docker.com/install/linux/docker-ce/ubuntu/
---

> Para windows
https://docs.docker.com/docker-for-windows/install/
}}


### Docker: Virtualizacion
{{% pageinfo%}}
#### 
**Lectura recomendada**
### Qué es docker
{{<color_green>}}Docker{{</color_green>}} es una empresa https://www.docker.com/company/ que entre otros productos ofrece una tecnología de virtualización basada en contenedores.

Empieza su desarrollo en 2010 impulsada por Solomon Hykes,   y actualmente la compañía se llama '''''Moby Proyect'''''.

Entre otras, en  una  idea inicial, Docker permite tomar instantáneas de un determinado entorno de ejecución, incluyendo el sistema operativo, servicios y procesos necesarios, aislándolo del sistema anfitrión dónde se esté ejecutando. Para hacer instantáneas, se procede igual que los commit de git (también es el comando docker commit) y pudiendo en cualquier momento recuperar dicho entorno de ejecución en  un determinado instante, siempre independizados del entorno (Sistema anfitrión dónde se esté ejecutando el elemento concreto de docker).

En este proceso de {{<color_green>}}empaquetamiento{{</color_green>}} en una sola entidad con forma de archivo (<span class="R">contenedor</span>) se van a agrupar el código fuente y las dependencias requeridas para que el software funcione.

*Aquí está el concepto de ***contenedor*** un programa que virtualiza el software deseado para ese determinado entorno de ejecución. De este <span class="R">contenedor</span> podemos comitear a imágenes nuevas en cualquier momento. Igualmente de  una imagen concreta se puede levanta un contendor de forma muy rápida (cuestión de segundos o menos....). Si vamos realizando nuevas instalaciones en el contenedor, vamos guardando solo los cambios que se van produciendo. Podremos visualizar los difernetes cambios.
{{% /pageinfo%}}

{{< alert title="Particularidades" color="warning" >}}
 En cada commit solo se guardan los cambios realizados desde el commit anterior
{{< /alert >}}

 {{< alert title="Definición" color="dark" >}}
Es un sistema de virtualización  de código abierto basado en contenedores
 {{< /alert >}}
{{< alert title="Idea intuitiva" color="primary" >}}
Utilizar **software** para *emular* el sistema necesario que pueda contener ***un determinado sistema operativo disponible para ser usado***
{{< /alert >}}
{{< alert title="Virtualiza Docker un S.O." color="success" >}}
No es cierto, docker utiliza y comparte el kernel del sistema operativo anfitrión, virtualiza todo lo necesario para poder crear un determinado entorno de ejecución de forma totalmente aislada al sistema operativo anfitrión, incluyendo cambios en el propio sistema operativo. En esta línea sí que se puede comparar a una instantánea de un sistema operativo, pero no es su objetivo ni lo que pretende. Su objetivo es crear un entorno de ejecución independiente y chroot}}
{{< /alert >}}
![Docker]("images/docker/Docker_general_1.png")
 



