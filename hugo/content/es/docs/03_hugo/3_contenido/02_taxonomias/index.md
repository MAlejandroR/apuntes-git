---
title: "Taxonomías"
date: 2021-10-04T13:19:24+02:00
draft: false
weight: 24
icon: fas fa-file-alt
description: "Añadiendo contenido a nuestro sitio web"
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
