---
title: "Plantillas "
date: 2021-10-04T13:19:43+02:00
draft: false
weight: 27
---

{{% pageinfo %}}
Algunas notas sobre el trabajo con las plantillas:
* Sintaxis básica de las plantillas en Hugo
* Organización de las plantillas. Directorio `layout`
* Modificación de una plantilla
* Creación de plantillas


**Documentación:**  https://gohugo.io/templates/
{{% /pageinfo %}}

## Sintaxis básica
Un plantilla es una página html donde utilizando una notación especial, vamos a poder incluir elementos que vamos a partir de un lenguaje de programación y las variable que gestione.

Las variables las podríamos declarar y asignar dentro de esas secciones de código, o bien, recuperarlas de las declaradas y asignadas en los ficheros de configuración como es {{<color>}}config.toml{{</color>}} con el que estamos trabajando constantemete
fini>

En hugo, como con otros muchos sistemas de plantillas (en el curso veremos smarty o twing y blade), usamos la notación de dobles brackets para incorporar código externo.
Por ejemplo podría tener una plantilla  personalizada, podríamos escribir lo siguiente
```html
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
</head>
<body>
<h1>Esto es un ejemplo de plantilla</h1>
<h2>aquí el título del fichero md en el frontmatter</h2>
<hr>
<span style="color:red">{{.Title}}</span>
<hr>

<h3>Declaro y luego visualizo una variable</h3>
{{ $nombre := "Manuel" }}
<h2>Valor de variable $nombre</h2>
<hr>
<span style="color:red">{{ $nombre}}</span>
<hr>
</body>
</html>
```
Vemos una página que es completamente independiente del resto, donde utilizo una variable de los ficheros de configuración

Ahora me queda crear un fichero md y especificar que utilice esta plantilla, la cual almacenaremos en {{<color>}}layout/_default/ejemplo_plantilla.html{{</color>}}

Creamos un fichero md llamado plantilla.md y en él especificamos en el {{<color>}}frontmatter{{</color>}} que utilice esta plantilla

```toml
---
layout: ejemplo_plantilla
draft: "false"
title: "Plantillas"
---
# Uso de una plantilla
En esta página veremos el uso de una plantilla
```


{{% pageinfo%}}
 **El resultado serán**
 ***
 ![plantilla personalizada](/images/relearn/plantillas/plantilla_customer.png)
{{% /pageinfo%}}


Acceso a variables predefinidas:
```go-html-template

{{ .Title }}

{{ .Params.bar }}

{{ if or (isset .Params "alt") (isset .Params "caption") }} Caption {{ end }}

<title>{{ .Title }}</title>
``` 

## Partial 

Incluye un fragmento en una plantilla para no tener que repetirlo:

```go-html-template
{{ partial "<PATH>/<PARTIAL>.<EXTENSION>" . }}.

# Por ejemplo: layouts/partials/header.html partial

{{ partial "header.html" . }}

```

{{% alert title="Importante" color="danger" %}}
Los partials nos ayudan a reutilizar el código y a no repetir fragmentos.
{{% /alert %}}

## Plantillas base y bloques
https://gohugo.io/templates/base/
`layouts/_default/baseof.html`


```html
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>{{ block "title" . }}
      <!-- Blocks may include default content. -->
      {{ .Site.Title }}
    {{ end }}</title>
  </head>
  <body>
    <!-- Code that all your templates share, like a header -->
    {{ block "main" . }}
      <!-- The part of the page that begins to differ between templates -->
    {{ end }}
    {{ block "footer" . }}
    <!-- More shared code, perhaps a footer but that can be overridden if need be in  -->
    {{ end }}
  </body>
</html>
```

`layouts/_default/single.html`
```go-html-template
{{ define "title" }}
  <!-- Sobreescribe el valor de  baseof.html -->
  {{ .Title }} &ndash; {{ .Site.Title }}
{{ end }}
{{ define "main" }}
  <h1>{{ .Title }}</h1>
  {{ .Content }}
{{ end }}
```

## Funciones

https://gohugo.io/templates/introduction/

## Parámetros de las páginas
https://gohugo.io/templates/introduction/#use-content-page-parameters

Podemos usar datos escritos en el **front-matter** de la página desde la plantilla:

```go-html-template
{{ if not .Params.notoc }}
<aside>
  <header>
    <a href="#{{.Title | urlize}}">
    <h3>{{.Title}}</h3>
    </a>
  </header>
  {{.TableOfContents}}
</aside>
<a href="#" id="toc-toggle"></a>
{{ end }}
```


## Uso de la configuración del sitio

https://gohugo.io/templates/introduction/#use-site-configuration-parameters

Y también datos del archivo de configuración general: 

```go-html-template
{{ if .Site.Params.copyrighthtml }}
    <footer>
        <div class="text-center">{{.Site.Params.CopyrightHTML | safeHTML}}</div>
    </footer>
{{ end }}
```

## Uso de datos de la página

**Archetype** ejemplo
```toml
---
title: ​ " ​ {{​ ​ replace​ ​ .Name​ ​ "-" " " | title }}"
draft: false
image: ​ //via.placeholder.com/640x150
alt_text: ​ " ​ {{​ ​ replace​ ​ .Name​ ​ "-" " " | title }} screenshot"
summary: ​ " ​ Summary​ ​ of​ ​ the​ ​ {{​ ​ replace​ ​ .Name​ ​ "-" " " | title }} project"
tech_used:
- ​ JavaScript
- ​ CSS
- ​ HTML
---

```

**Template**
```go-html-template
{{ define "main" }}
  <div class="project-container">
    <section class="project-list">
      <h2>Projects</h2>
      <ul>
        {{ range (where .Site.RegularPages "Type" "in" "projects") }}
          <li><a href="{{ .RelPermalink }}">{{ .Title }}</a></li>
        {{ end }}
      </ul>
    </section>

    <section class="project">
      <h2>{{ .Title }}</h2>

      {{ .Content }}
      <img alt="{{ .Params.alt_text }}" src="{{ .Params.image }}">

      <h3>Tech used</h3>
      <ul>
        {{ range .Params.tech_used }}
          <li>{{ . }}</li>
        {{ end }}
      </ul>

    </section>

  </div>
{{ end }}
```
### Práctica
{{< alert title="Ahora practica tú" color="success" >}}
:smiley:
 En este caso puedes porbar a crear una plantilla personal  y mostrarla

{{< /pageinfo >}}