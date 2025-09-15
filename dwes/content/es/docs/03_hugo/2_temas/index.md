---
title: "Temas o layouts base"
date: 2021-10-04T13:19:24+02:00
draft: false
weight: 22
icon: fa-solid fa-palette
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
Usaremos la plantilla [relean](https://themes.gohugo.io/themes/hugo-theme-relearn).
[Aquí puede ver la página de referencia](https://mcshelby.github.io/hugo-theme-relearn/) 

La página que estás viendo, está trabajada con la plantilla [docsy](https://www.docsy.dev/docs/)

## Instalar una plantilla
Hugo ofrece varias opciones para usar temas. Normalmente cada  tema es compatible con ella:

{{<color_green>}}Añadir el tema como un Módulo de Hugo{{</color_green>}}

>Es la forma más simple y moderna. Hugo descarga los archivos del tema desde el repositorio de Docsy en la versión que elijas, y es fácil mantener el tema actualizado. El sitio de ejemplo de Docsy usa esta opción.

{{<color_green>}}Añadir el tema como un submódulo de Git{{</color_green>}}
>Permite usar los archivos del tema desde su propio repositorio, pero es más complicado de mantener que los módulos de Hugo. Se utilizaba en versiones antiguas del sitio de ejemplo de Docsy, pero sigue siendo compatible.

{{<color_green>}}Clonar los archivos del tema{{</color_green>}}
>Si prefieres no depender de un repositorio externo, puedes clonar los archivos del tema directamente en tu proyecto. Esto es útil si deseas personalizar el tema o tu despliegue requiere que el tema esté dentro de tu repositorio.

#### Clonar los archivos
* Es interesante para tener los ficheros originales por si queremos hacer cambios o adaptaciones, aunque no sea la forma de cargar la plantill (recomendado hacerlo con módulos)

Las plantillas deben de ubicarse en el directorio **{{<color_green>}}themes{{</color_green>}}**

````bash
cd themes
git clone https://github.com/McShelby/hugo-theme-relearn.git relearn
````

{{< alert title="Git" color="warning" >}}
Usar Git es fundamental.    

**Git** es una herramienta muy importante que hemos de conocer desde el principio, si bien, la estudiaréis en el módulo de *despliegue*
{{< /alert >}}


También puedes descargar directamente la carpeta y descomprimirla


Ahora toca modificar el fichero de configuración {{<color>}}config.toml{{</color>}}, especificando la ubicación del thema, en este caso el directorio *relearn*
```toml
theme =['relearn']
```

Ahora ya podemos ver un despliegue del sitio web. Para ello invocamos al {{<color>}} comando cli {{</color>}} siguiente:

```shell
hugo server &
```

{{< alert title="Solo Linux " color="warning" >}}
el ***&*** es para ejecutar el comando en backgroud y no bloquear el terminal. Solo para linux
{{< /alert >}}


Nos abrirá un puerto en el navegador según nos muestre la salida en el terminal con el puerto abierto y veremos nuestro proyecto


{{< imgproc first_page Fit " 400x300 center" >}}
Página inicial
{{< /imgproc >}}

Dependiendo del tema, habrá un contenido u otro. Este tema en concreto nos muestra el contenido de una página **themes/relearn/layouts/partial/initial.md**. 
Si quisiéramos cambiar el contenido de la página, en lugar de cambiar el fichero, lo que haríamos es copiar el fichero en la carpeta **layout** del directorio del proyecto. volveremos a esto más adelante.

### Añadir módulo de hugo
Usamos el comando para crear go.mod, donde se especifica el módulo a añadir
```bash
hugo mod init localhost
```
Localhost sería el servidor dónde vamos a ubicar el despliegue de nuestro proyecto  

Añadimos el módulo en nuestro fichero de configuración **hugo.toml**
```toml

[modulo]
  [[module.imports]]
          path = 'github.com/McShelby/hugo-theme-relearn'
```

Ahora ordemaos y descargamos el módulo haciéndolo disponible en nuestro proyecto
```bash
hugo mod tidy
````
Ya podemos levatar el servidor para verlo
```bash
hugo server 
```
{{< alert title="Observa" color="warning" >}}
cómo se modifica el fichero **go.mod**
{{< /alert >}}
### Anadir un submódulo
* *Especialmente útil si vamos a desarrollar y desplegar nuestro proyecto en Git.**

*Iniciamos nuestro proyecto en git
```bash
git init
```

Añadimos el submódulo del tema
```bash
git submodule add --depth 1 https://github.com/McShelby/hugo-theme-relearn.git themes/hugo-theme-relearn
```

Y ahora lo especificamos en el fichero de configuración ***hugo.toml***.
```tolm
theme = 'hugo-theme-relearn'
```

### Práctica
{{< alert title="Ahora practica tú " color="success" >}}
:grinning:
* Instala el tema **relearn** (u otro si deseas), en el sitio web que hayas construído (hay plantillas que tienen algún requerimiento especial para ser visualizado, como esta de **docsy** que usamos para estos apuntes). Mejor usa una más minimalista.

* Ejecuta el comando de hugo para abrir un puerto en local

* Visualiza tu proyecto en el servidor
 
* Modifica el contenido de la página inicial
 
* Prueba a instalar el thema de las tres formas posibles

{{< /alert >}}
