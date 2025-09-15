---
title: "Plantillas "
date: 2021-10-04T13:19:43+02:00
draft: false
weight: 27
icon: fab fa-html5
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

Una plantilla es una página HTML donde, utilizando una notación especial, podemos incluir elementos que provienen de un lenguaje de programación y las variables que este maneja.

Las variables pueden declararse y asignarse dentro de esas secciones de código, o bien, recuperarse de las ya declaradas y asignadas en los ficheros de configuración, como por ejemplo en `config.toml`, con el que trabajamos constantemente.

En Hugo, como en muchos otros sistemas de plantillas.
Son muy conocidos Twing, Smarty, Blade, ... (en el curso veremos Blade); usamos la notación de dobles llaves `{{ }}` para incorporar código externo. Por ejemplo, en una plantilla personalizada, podríamos escribir lo siguiente:

```html
<!DOCTYPE html>
<html lang="en">
<head>
 <meta charset="UTF-8">
 <title>Title</title>
</head>
<body>
<h1>Esto es un ejemplo de plantilla</h1>
<h2>Aquí el título del fichero Markdown en el frontmatter</h2>
<hr>
<span style="color:red">{{ .Title }}</span>
<hr>

<h3>Declaración y visualización de una variable</h3>
{{ $nombre := "Manuel" }}
<h2>Valor de la variable $nombre</h2>
<hr>
<span style="color:red">{{ $nombre }}</span>
<hr>
</body>
</html>
``` 
Vemos que es una página con un formato  independiente y diferentes del resto de mi sitio web, donde utilizo una variable de los ficheros de configuración.

Ahora creamos un fichero {{< color >}} Markdown {{< /color >}} y especificamos que use esta plantilla, la cual almacenaremos en {{< color >}} layout/_default/ejemplo_plantilla.html {{< /color >}}.

Creamos un fichero llamado {{< color >}} plantilla.md {{< /color >}} y en {{< color >}} el frontmatter {{< /color >}} especificamos que use esta plantilla.

```yaml
---
layout: "ejemplo_plantilla"
draft: "false"
title: "Plantillas"
---
# Uso de una plantilla
En esta página veremos el uso de una plantilla
```


{{% pageinfo%}}
 **El resultado serán**
 ***
{{< imgproc plantilla_personalizada Fill "572x357" >}}

{{< /imgproc >}}
 
 {{% /pageinfo%}}

### Acceso a variables predefinidas:
Dentro de la plantilla podemos acceder a variables que hayamos definido en un fichero de configuración o bien en la sección front matter, o bien ![variables predefinidas por el entorno de hugo](https://gohugo.io/methods/) 
 Por ejemplo creo una variable en el frontmatter de la página md
```toml
bar = "esto es una prueba"
```

Ahora modificamos la plantilla añadiendo:
```html
<h1>Valores de variables del entorno</h1>
<ul>
    <li>Fecha {{ .Page.Date}}</li>
    <li>Título {{ .Page.Title}}</li>
    <li> Valor de variable bar {{.Params.bar}}</li>
    <li> URL {{.Site.BaseURL}}</li>
    <li> CopyRight {{.Site.Copyright}}</li>
</ul>
```

Y observamos cómo sale

{{< imgproc  variables Fill "600x400" >}}

{{< /imgproc >}}



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

 El uso de partials, nos va a permitir creaer una plantilla que se integre en nuestro sitio web

Tomemos como ejemplo la plantilla que tenemos acutalmente
{{< imgproc variables Fill "600x400" >}}

{{< /imgproc >}}

Si le agregamos {{< color >}} partiasl {{< /color >}} vemos cómo se va adaptando a las páginas nuestras

{{< highlight php "linenos=table, hl_lines=3 5 12" >}}
<!DOCTYPE html>
<html lang="en">
 {{ partial "menu.html" . }}

 {{ partial "header.html" . }}
 <title>{{ .Title }}</title>
 
 
 <body>
   <h1>Esto es un ejemplo de plantilla</h1>
   <h2>Aquí el título del fichero Markdown en el frontmatter</h2>
   {{ .Content}}
   <hr>
   <span style="color:red">{{ .Title }}</span>
   <hr>
   
   <h3>Declaración y visualización de una variable</h3>
   {{ $nombre := "Manuel" }}
   <h2>Valor de la variable $nombre</h2>
   <hr>
   <span style="color:red">{{ $nombre }}</span>
   <hr>
   
   <h1>Valores de variables del entorno</h1>
   <ul>
       <li>Fecha {{ .Page.Date}}</li>
       <li>Título {{ .Page.Title}}</li>
       <li> Valor de variable bar {{.Params.bar}}</li>
       <li> URL {{.Site.BaseURL}}</li>
       <li> CopyRight {{.Site.Copyright}}</li>
   </ul>
   
 </body>
</html>

{{< / highlight >}}


* En la línea 3 agregamos el menú izquierdo
* En la línea 5 agregamos la cabecera
* En la línea 12 Añadimos el contenido del fichero markdown

Y vemos cómo ha cambiado la página

{{< imgproc 2_plantilla_del_sitio Fill "1442x818" >}}

{{< /imgproc >}}


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