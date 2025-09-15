---
title: "Temas o layouts base"
date: 2021-10-04T13:19:24+02:00
draft: false
weight: 22
description: "Utilización de layouts o platillas html para visualizar el contenido"
---
{{% pageinfo %}}
:white_check_mark:
**Objetivo**:
* Asociar una plantilla o theme al sitio web
* Acceder al fichero de configuración del sitio web **config.toml**
**Páginas referenciadas o de consulta**
* https://desarrolloweb.com/articulos/generar-contenido-site-hugo (primera parte)
* Plantillas disponibles en *hugo*  https://themes.gohugo.io/
* Plantilla usada como ejemplo*relearn*:  https://themes.gohugo.io/themes/hugo-theme-relearn/
{{% /pageinfo %}}

# Tema, plantilla o layout para el sitio web

Ahora que tenemos nuestro sitio web, lo primero que tenemos que hacer es asociar una plantilla o theme a nuestro sitio para poder visualizar su contenido.
Para referirnos a la plantilla usaremos el término  **theme** o **layout**

Esto va a dar un aspecto concreto y ya podríamos ver nuestro sitio web funcionando. Para ver las [plantillas disponibles](https://themes.gohugo.io/)   disponibles en el sitio web de [hugo](https://gohugo.io/)

Vamos a ir proponiendo una plantilla y la usaremos de ejemplo para el resto de las explicaciones

Para la práctica final, podrás usar esta misma plantilla o bien usar otra según te guste más.
Usaremos la plantilla [relean](https://themes.gohugo.io/themes/hugo-theme-relearn)

La página que estáS viendo, está trabajada con la plantilla [docsy](https://www.docsy.dev/docs/)

## Instalar una plantilla
Tenemos diferentes modos de instalar una plantilla.

Todas ellas han de dejar en la carpeta **themes** de nuestro proyecto una carpeta con el desarrollo de  la plantilla que nos vamos a descargar de **git**  
Las formas de obtener esta carpeta puede ser:
1. Descargar el desarrollo y descomprimirlo en la carpeta
2. Clonar directamente en el carpeta con *git clone*
3. Clonarlo como un *submodule* a partir de la carpeta del proyecto

Para ver esta acciones vamos a realizarlo con la plantilla *relearn* que hemos comentado anteriormente

**Git** es una herramienta muy importante que hemos de conocer desde el principio, si bien, la estudiaréis en el módulo de *despliegue* 

### Descargar la carpeta
*Localizamos el sitio web del tema a partir de la página de hugo.

 Localizamos el sitio de esta plantilla ( a partir de hugo themes)
 [relearn site](https://relearn.netlify.app/)
 Ahí podemos ver la documentación y guía de instalación
Indicamos las acciones, una vez creado el sitio web con hugo y ubicado en la carpeta creada
```shell
cd themes
git clone https://github.com/theNewDynamic/gohugo-theme-ananke.git relearn
```
También puedes descargar directamente la carpeta o bien, hacer el git como un submodule desde la carpeta principal del proyecto.
El nombre que especificamos para la carpeta  destino (en este caso *relearn*), es el que nosotros queramos
Ahora toca modificar el fichero de configuración {{<color>}}config.toml{{</color>}}, especificando la ubicación del thema, en este caso el directorio *relearn*
```toml
theme =['relearn']
```

Ahora ya podemos ver un despliegue del sitio web. Para ello invocamos al {{<color>}} comando cli {{</color>}} siguiente:

```shell
hugo server &
```

{{< alert title="Observación" color="warning" >}}
el ***&*** es para ejecutar el comando en backgroud y no bloquear el terminal
{{< /alert >}}


Nos abrirá un puerto en el navegador según nos muestre la salida en el terminal con el puerto abierto y veremos nuestro proyecto


{{< imgproc first_page Fit " 400x300 center" >}}
Página inicial
{{< /imgproc >}}

Dependiendo del tema, habrá un contenido u otro. Este tema en concreto nos muestra el contenido de una página **themes/relearn/layouts/index.html**. 
Si quisiéramos cambiar el contenido de la página, en lugar de cambiar el fichero, lo que haríamos es copiar el fichero en la carpeta **layout** del directorio del proyecto. volveremos a esto más adelante.
### Práctica
{{< alert title="Ahora practica tú " color="success" >}}
:grinning:
* Instala el tema **relearn** (u otro si deseas), en el sitio web que hayas construído (hay plantillas que tienen algún requerimiento especial para ser visualizado, como esta de **docsy** que usamos para estos apuntes). Mejor usa una más minimalista.

* Ejecuta el comando de hugo para abrir un puerto en local

* Visualiza tu proyecto en el servidor

{{< /alert >}}
