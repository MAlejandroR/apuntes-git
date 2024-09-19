---
title: "Contenido"
date: 2021-10-04T13:19:24+02:00
draft: false
weight: 23
description: "Dotar a nuestro sitio de contenido para publicar"
---
{{% pageinfo %}}
:white_check_mark:
**Objetivo**:
* Asociar una plantilla o theme al sitio web
* Estructurar contenido para mejorar la visualización del sitio.
* Organizar los contenidos que vamos a publicar (Orgnaizaremos por directorios y ficheros)

**Páginas referenciadas o de consulta**
* https://gohugo.io/content-management/organization/ 
* https://desarrolloweb.com/articulos/generar-contenido-site-hugo
* Plantillas disponibles en *hugo*  https://themes.gohugo.io/
* Plantilla usada como ejemplo*relearn*:  https://themes.gohugo.io/themes/hugo-theme-relearn/
{{% /pageinfo %}}


# Contenido
Ahora que tenemos una plantilla, queda lo principal, que es aportar contenido a nuestro sitio web.
Son sitios estáticos, por lo que nuestro objetivo es aportar ficheros de texto con datos, información, imágenes, efectos visuales para que sean publicados en la web.
La idea va a ser aportar ficheros en formato [markdown]() cuyo contenido queremos 
## ¿Qué estructura tiene el contenido de las páginas?
* Ahora toca aportar contenido a nuestro sitio web. Las páginas Tipos de páginas de contenido. Agrupar las páginas por tipos.
* En Hugo el contenido se organiza como luego se va a ver en la web. Anidamos el contenido en subdirectorios (**secciones**): `content/<directorios>`
* Pensar en **front-matter** - **archetypes**
* Plantillas específicas para cada modelo

## Creando contenido: markdown
Para crear nuevo contenido vamos  a generar páginas de texto con formato **markdown** [*(Hablamos más abajo sobre el tema)*](#markdown)
Podemos consultar las siguientes referencias para el texto en markdown. Son las páginas que dirigen la web de hugo

* [Daring Fireball: Markdown, John Gruber (Creator of Markdown)](https://daringfireball.net/projects/markdown/)
* [Markdown Cheatsheet, Adam Pritchard](https://github.com/adam-p/markdown-here/wiki/Markdown-Cheatsheet)
* [Markdown Tutorial (Interactive), Garen Torikian](https://www.markdowntutorial.com/)
* [The Markdown Guide, Matt Cone](https://www.markdownguide.org/)
__Otras referencias__
* [https://github.com/adam-p/markdown-here/wiki/Markdown-Cheatsheet](https://github.com/adam-p/markdown-here/wiki/Markdown-Cheatsheet)
* https://programminghistorian.org/es/lecciones/introduccion-a-markdown
*
Este metalenguaje o lenguaje con marcas es muy utilizado en la documentación técnica.

Es importante aprender a utilizarla con cierta flexibilidad

### Creando páginas de contenido
Lo primero establecemos la organización de nuestros contenidos

```markmap
# Sitio Web

## Sección 1
 directorio
### _index.md (fichero indice de sección 1)
### Tema 1 de la sección 2 (fichero md)
### Tema 1 de la sección 2 (fichero md)
## Sección 2
### _index.md (fichero indice de sección 2)
### Tema 1 de la sección 2 (fichero md)
### Tema 1 de la sección 2 (fichero md)
### Tema 1 de la sección 2 (fichero md)
## Seccion 3 
### ....
## ...
```
Observamos cómo usamos diferentes directorios para crear nuestra organización de nuestro contenido.

Cada directorio corresponderá a una **sección**

Dentro de cada sección puede haber un fichero **_index.md** cuyo contenido se visualizará cuando seleccionemos el directorio concreto.
Por ejemplo para el contenido del curso podría tener una organización como se muestra en la imagen siguiente:
```markmap
# DWES

## Introducción al desarrollo web
## Sitios estáticos
### Teoría
### Práctica

## PHP
- [Web de referencia](https://php.net)
### Sintaxis básica
### Arrays y formularios
### PHP orientado a objetos
### Bases de datos
#### Repaso de sql y concetos de BD
#### Mysqli en php
#### PDO en php
### Librerías y utilidades de php
### Laravel
- [Web de referencia](https://laravel.com/docs/8.x)
#### Uso de un framework en la programación web
#### Rutas
#### Controladores y vistas
#### Eloquent y bases de datos
```
#### Creando ficheros y secciones
Usaremos el CLI de hugo (línea de comandos) para crear ficheros de contenido y/o secciones
```bash
hugo new [seccion]/fichero.md
```
La sección puede ser un directorio o varios (subdirectorios anidados)

Los ficheros se crean en la carpeta **content** del directorio raíz del proyecto

El fichero creado tendrá un  contenido según quede especificado en el fichero **patrón** ubicado en la carpeta **archetypes/default.md**
{{% pageinfo%}}
 **Creando un fichero md**
```bash
hugo new docs/prueba.md
```
*Genera un fichero con el siguiente contenido*
```toml
---
title: "Prueba"
date: 2021-10-04T19:39:33+02:00
draft: false
---
```
{{%/pageinfo%}}
**Las páginas en el directorio content**
*Las páginas ubicadas directamente en el directorio **content** serán páginas decir globales o bundles pages: contacto, about, datos relevantes. Estas páginas no son  secciones y por lo tanto no tendrán contenidos

La forma de organizar las secciones dependerá de nuestra visión del sitio y en cualquier caso deben de ser páginas relacionadas con el tema de la sección: teoría, prácticas ,....

Cada directorio puede contener un fichero llamado **_index.md** que va a contener el índice o información que se visualizará al cargar la sección concreta, sería como el fichero índice de la sección.

##### Creando ficheros con realearn

En el caso de la plantilla que estamos usando ([ver documentación ](https://mcshelby.github.io/hugo-theme-relearn/cont/pages/)), clasifica las páginas de dos tipos, las que son cabecera de un tema o sección (*_index.md*) y las que tienen contenido de las mismas.

Para crear las páginas de un tipo u otro, tiene una serie de argumentos
{{% pageinfo%}}
**Ejemplo de cómo hacerlo con relearn**
* Para crear una página que es cabecera de capítulo (creamos la sección teoría y el fichero _index.md)
```shell
 hugo new chapter --kind teoria/_index.md
```
* Para crear un fichero dentro de la sección teoría 
```shell
 hugo new chapter --kind teoria/tema1.md
 ```

{{% /pageinfo%}}
### Front   matter
 https://gohugo.io/content-management/front-matter/
Cuando generamos contenidos, los ficheros creados vemos que en la cabecera o primeras líneas  pueden tener ***metainformación***
Esta información va entre tres líneas y constituye lo que se llama el **front matter** de la página
En esta sección daremos valores a variables que luego se pueden utilizar.

De los diferentes valores, nos interesa ver alguno que suele estar en el archtypes y suelen aparecer por defecto:
* **title** será el título que va a tener esta página para referenciarse en los diferentes menús
* **weight** es una de las formas de ordenar las páginas y secciones.
* **draft** Indica si la página es borrador *true* o no. En caso de ser borrador nos e visualizará.
* **description** Es una descripcion que aparecerá en la página principal o index de esta sección. Aparecerá para cada página, salvo que se especifique que no lo queramos. visualizará.





La información del fichero creado anteriormente corresponde al **Front matter**, el cual es aportado por el fichero base o patrón ubicado en la carpeta **archetypes**


```
content
└── blog        <-- Sección, porque es el primer nivel bajo content/  
    |   ├── funny-cats
    │   ├── mypost.md
    │   └── kittens         <-- Sección porque contiene _index.md
    │       └── _index.md
    └── tech                <-- Sección porque contiene _index.md
        └── _index.md

```
{{%pageinfo%}}
**Repaso**
* Lo que precede al contenido
* Sintaxis especial
* Hay unas variables predefinidas pero el usuario puede crear nuevas.
* Se genera según el **archetype** de la sección. Por defecto *_default.md*
* Se pueden pasar valores por defecto a las páginas que descienden de una sección.
Por ejemplo si ponemos en `content/blog/_index.md`
```toml 
title = 'Blog'
[cascade]
  banner = 'images/typewriter.jpg'
```
Esta página y todas las que descienden de la sección `blog` devuelven `images/typewriter.jpg` en `.Params.banner` a no ser que tengan su propio banner o un ancestro más cercano lo modifique.
{{%/pageinfo%}}

{{%pageinfo%}}
**Referencias**
* https://gohugo.io/content-management/front-matter/
* https://gohugo.io/variables/page/
  {{% /pageinfo%}}
## Taxonomías
https://gohugo.io/content-management/taxonomies

Una taxonomía es una categorización que nos permite clasificar contenido.

Por ejemplo, en una web de Películas podríamos tener actores, directores, estudios, géneros, años, premios ... 
A continuación se muestra un breve ejemplo, pero esta parte no la vamos a incluir en nuestro ejemplo.

Por defecto Hugo añade las taxonomías **categories** y **tags**. Se pueden añadir más en **config**

```toml
[taxonomies]
  category = 'categories'
  tag = 'tags'
```
Si se quiere deshabilitar:

```toml
disableKinds = ['taxonomy', 'term']
```

En **frontmatter**
```yaml
categories:
- Personal
- Trabajo
tags:
- software
- html
```
### Práctica
{{< alert title="Ahora practica tú " color="success" >}}
:grinning:
* Establece un contenido para tu sitio web.
 Para ello debes de tener clara las secciones y en cada sección los ficheros contenidos
  Por ejemplo podría ser parte  del contenido de este curso visto anteriormente
```markmap
# content_ (directorio raíz base)
## Introducción 
### _index.md
### conceptos_generales.md
### arquitectura_web.md
### instalación.md
## Static
### _index.md
### teoría.md
#### _index.md
#### instalacion.md
#### temas.md
#### contenido.md
### Práctica
#### _index.md
#### practica1.md
#### practica2.md
## PHP
### _index.md
### Sintaxis.md
### Arrays_formularios.md
### OOP.md
```
Con esto nos aparecerá  la siguiente estructura:

{{< imgproc estructura_content Fit " 400x300 center" >}}
Ejemplo de contenido
{{< /imgproc >}}


Ahora completa los ficheros con contenido (no hace falta que haya muchos, mejor que tenga sentido, que vayas realizando tu portfolio, que sea tu forma de presentarte y mostrar a los demás en qué estás trabajando, puede ser un blog, ...

Recuerda cómo se crean las secciones, ficheros _index y ficheros de contenido en este template

También podrías usar la estructura anterior e ir completándola con esquemas, resúmenes de los aspectos que vayas aprendiendo en el curso.

Ahora reordena todo usando el *frontmatter*, recuerda la propiedad **weight**, modifica los títulos según consideres y puedes poner una descripción.

Ve revisando como queda todo al visualizarlo en la web 


Comprueba en el servidor como se ha actualizado tu sitio web
{{< /alert >}}
