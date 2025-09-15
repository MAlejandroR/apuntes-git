---
title: "Añadiendo"
date: 2021-10-04T13:19:24+02:00
draft: false
weight: 24
icon: fas fa-file-alt
description: "Añadiendo contenido a nuestro sitio web_old"
---

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
# Markdown

* Muy importante

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
