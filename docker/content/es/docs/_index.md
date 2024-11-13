---
title: "Introducción"
linkTitle: "Docker"
weight: 10
icon: fas fa-docker
---


{{< objetivos  title="Docker" sub_title="Objetivos de este tema">}}
Entender qué es docker
Crear contenedores
Crear Imágenes
Trabajar con entornos dockerizados para desarrollo
Crear imágenes con DockerFile
Crear servicios con docker compose
{{< /objetivos >}}
{{<referencias>}}
* La mejor la oficial:
> https://docs.docker.com/engine/
* Artículo interesante de Mauricio Collados, donde he sacado ideas para este tema
> https://medium.com/ingenier%C3%ADa-en-tranqui-finanzas/una-gu%C3%ADa-no-tan-r%C3%A1pida-de-docker-y-kubernetes-933f5b6709df
* Curso gratuito de docker
> https://jgaitpro.com/p/introduccion-a-containers-en-docker
* Instalar contenedor en windows (ver minutos 6:10 - 9:21
> https://www.youtube.com/watch?v=9FoWrDx6n2k

{{</referencias>}}

{{< alert title="Lectura recomendada" color="success" >}}
> * Esta página por su puesto no es para estudiar.
> * Trata de contextualizar docker con un poco de historia y su evolución
> * Trata de sus orígenes,
> *  ***Como técnicos/as en tecnologías, es bueno que conozcamos algo de historia de la tecnología con la que trabajamos***

{{< /alert >}}
{{< pageinfo>}}
<strong>Resumen de un poco de historia</strong>
{{<line>}}
El desarrollo de {{< color >}} Docker comenzó en 2010 {{< /color >}}, impulsado por {{< color >}} Solomon Hykes {{< /color >}}, quien trabajaba como ingeniero en una empresa que más tarde se renombraría como {{< color >}} Docker Inc {{< /color >}}.
<br />
Ahí se creó inicialmente {{< color >}} Docker como una plataforma de contenedores {{< /color >}}, y con el tiempo se convirtió en una tecnología y una marca ampliamente reconocida para la {{< color >}} virtualización basada en contenedores {{< /color >}}, algo que después de 2013 cuando Solomon lo presentó en una conferencia al munso, cambió totalmente el enfoque del desarrollo.
<br />
Solomon Hykes dejó Docker Inc. en 2018 para centrarse en nuevos proyectos.
<br />
En 2017, Docker Inc. lanzó el {{< color >}} Moby Project {{< /color >}}, un proyecto de código abierto que descompone Docker en varios componentes modulares y reutilizables.
<br />
El objetivo de Moby es permitir a los desarrolladores utilizar estos componentes de manera independiente para crear sus propias soluciones de contenedores personalizadas. En este proyecto, se desglosó Docker en componentes más pequeños y reutilizables
<br />

Actualmente, Docker sigue existiendo como un producto comercial y una plataforma completa que integra estos componentes en un paquete fácil de usar para crear y gestionar contenedores.
<br />
En otras palabras, Docker es la plataforma que los usuarios finales utilizan para trabajar con contenedores, mientras que Moby funciona como un {{< color >}} conjunto de herramientas {{< /color >}} de código abierto que sirve como base de Docker y permite a los desarrolladores crear soluciones a medida.
{{< /pageinfo>}}

{{< referencias  >}}
"What is Docker? The spark for the container revolution" (3 de marzo de 2021): Este artículo ofrece una visión detallada sobre los inicios de Docker y su impacto en la industria de contenedores. https://www.infoworld.com/article/2269272/how-docker-broke-in-half.html
"Solomon Hykes leaves Docker, the company he founded" (28 de marzo de 2018): Este artículo aborda la salida de Solomon Hykes de Docker y ofrece una visión de su impacto en la empresa. https://techcrunch.com/2018/03/28/solomon-hykes-leaves-docker-the-company-he-founded/
{{< /referencias >}}
# Historia de Docker: Innovación y Comunidad en la Contenerización

La historia de Docker es un proceso  de innovación y colaboración que ha incidido de forma muy clara y contundente en el mundo del desarrollo de software, popularizando el uso de contenedores.
{{< imgproc salomon_trabajando Fill "860x491" >}}

{{< /imgproc >}}
## Orígenes y dotCloud (2008)   
Docker tuvo sus orígenes en 2008 como un proyecto interno dentro de {{<color>}}dotCloud{{</color>}}, una empresa de plataforma como servicio fundada por {{<color>}}Solomon Hykes{{</color>}}.

Su objetivo era mejorar la eficiencia y portabilidad de las aplicaciones {{< color >}} al empaquetarlas en contenedores {{< /color >}} que pudieran **ejecutarse de forma consistente en diferentes entornos**.
{{< imgproc empaquetamiento Fill "300X300" >}}

{{< /imgproc >}}

## Lanzamiento Público de Docker (2013)
En 2013, Docker fue presentado al público y se lanzó como {{<color>}}software de código abierto{{</color>}} bajo la licencia Apache 2.0. 

Esta decisión fue clave, ya que permitió el crecimiento de una comunidad global en torno a Docker, impulsando su desarrollo y su adopción. 

La facilidad con la que {{< color >}} los contenedores Docker podían crearse y desplegarse {{< /color >}} ayudó a que se convirtiera en una herramienta popular entre desarrolladores y empresas.
{{< imgproc salomon_2013 Fill "1279x746" >}}
El día de la presentación de Salomon Hykes
<a href="https://www.google.com/search?q=presentaci%C3%B3n+docker+por+solomon+2013&oq=presentaci%C3%B3n+docker+por+solomon+2013&gs_lcrp=EgZjaHJvbWUyBggAEEUYOdIBCDg3MjBqMGo3qAIIsAIB&sourceid=chrome&ie=UTF-8#fpstate=ive&vld=cid:78729fe6,vid:zgR8otZkwHc,st:0>">Una reacción a la Presentación</a>

{{< /imgproc >}}
## Proyecto Moby (2017): Modularización y Flexibilidad
Para modularizar y estandarizar la construcción de sistemas de contenedores, en 2017 Docker, Inc. lanzó el {{<color>}}Proyecto Moby{{</color>}}.

Moby Project es una plataforma abierta que proporciona componentes básicos para crear soluciones personalizadas de contenerización.

{{< color >}} Docker {{< /color >}} sigue siendo la implementación más popular basada en Moby, pero Moby en sí mismo permite que otros desarrolladores construyan sus propias versiones y herramientas adaptadas a necesidades específicas.

## Docker como Producto Comercial
Docker, Inc. ha desarrollado Docker como un {{<color>}}producto comercial{{</color>}} que incluye herramientas avanzadas y soporte técnico, facilitando la adopción y administración de contenedores en entornos empresariales. 

Esta versión comercial se complementa con una comunidad de código abierto, lo que permite que Docker sea accesible tanto para individuos como para grandes empresas.

## Impacto de la Comunidad y Ecosistema de Código Abierto
La comunidad de desarrolladores ha sido fundamental en la evolución de Docker. Contribuciones de código, mejoras de rendimiento y soluciones innovadoras aportadas por la comunidad global han consolidado a Docker como la tecnología de contenedorización líder en la actualidad.

La adopción de Docker ha sido tal que se ha convertido en un {{<color>}}estándar para el empaquetado y despliegue de aplicaciones{{</color>}}.

## Popularización de Contenedores e Integración con Kubernetes
Docker popularizó la idea de los contenedores, transformándolos en una forma eficiente de empaquetar y distribuir aplicaciones. 

Su integración con otras tecnologías, especialmente {{<color>}}Kubernetes{{</color>}}, ha permitido crear ecosistemas de contenedores más complejos y escalables, adecuados para entornos de microservicios y despliegues en la nube.

## El Futuro de Docker
Docker continúa evolucionando y adaptándose a las tendencias emergentes, como la {{<color>}}computación en la nube{{</color>}} y el {{<color>}}edge computing{{</color>}}. 

A medida que el desarrollo de software se orienta cada vez más hacia infraestructuras dinámicas y escalables, Docker se posiciona como una tecnología clave en la implementación de aplicaciones modernas.
