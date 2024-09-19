---
title: "Shortcode"
date: 2021-10-04T13:19:53+02:00
draft: false
weight: 24
description: "Incluir **elementos visuales** html en nuestros ficheros **md**"

---


{{% pageinfo %}}
Extensiones a markdown. 

**IMPORTANTE:** Se usan dentro del texto **.md** no en las plantillas

Doc: https://gohugo.io/content-management/shortcodes
{{% /pageinfo %}}

Un shortcode es un fragmento  de código html que será renderizado dentro de un fichero md  cuando el sistema cargue o renderice dicha página de contenido
Es una forma de dar efectos visuales y de poder tener mayor funcionalidad dentro de nuestro sitio web

Vamos a ver algunos ejemplos. Hay que remarcar, que ciertos shortcode son propios de una plantilla, pero no costaría mucho poderlos tener en otra

Los shortcode los tenemos ubicados en la carpeta del tema **themes/nombre_tema/layouts/shorcode**

A continuación vamos a ver alguno de ellos

**Cargar una página de redes sociales a partir de la referencia**

* Supongamos que me gusta un vidoeclip de música publicado en **youtube**, y la web es https://www.youtube.com/watch?v=j9WyKTGAO2w

 Pues podría cargar ese vídeo usando el **shortcode** de hugo


```go-html-template
{{ <youtube j9WyKTGAO2w>}}
```
El efecto de ponerlo es el siguiente

{{<youtube j9WyKTGAO2w>}}
---
**Instagram**

```go-html-template
{{ < instagram BWNjjyYFxVx > }}
```
{{ <instagram BWNjjyYFxVx> }}

**Twitter**
```go-html-template
{{< tweet "manuel" 877500564405444608 >}}
```

Resultado
{{<tweet 877500564405444608>}}


**Vimeo**
```go-html-template
{{< vimeo 146022717 >}}
```
Resultado
{{<vimeo 146022717>}}
---
En el caso de relearn, tenemos varios e interesantes [shorcodes de relearn](https://mcshelby.github.io/hugo-theme-relearn/shortcodes/)  como vamos a ver. Visita la página y pruébalos cada uno.
### Algunos shortcode de Relearn

Puedes ver los [shortcodes](https://mcshelby.github.io/hugo-theme-relearn/shortcodes/) de la plantilla de [relearn](https://mcshelby.github.io/hugo-theme-relearn/)

*Para practicar debes de probar con los siguientes shortcodes
#### button
*El uso es con la siguiente sintaxis
```shell
{{%/* button href="referencia" /*%}}Label del botón{{% /button %}}
```
*Podemos incluir  atributos según puedes ver en la web de referencia 

#### attachments
*Este shortcode es muy práctico e interesante. con él podemos conseguir que aparezcan una serie de ficheros para que el usuario pueda descargar
*Consiste en colocar una carpeta de descargas con ficheros que queremos permitir que el usuario se descargue
*Para usarlo tenemos dos circunstancias:
1. Poner la carpeta de directamente bajo el directorio **content**
> En este caso colocaremos una carpeta llamada *****files***** y bajo ella todos los ficheros que pretendamos dejar en descargas
2. Poner la carpeta de descargas bajo otra subcarpeta del directorio **content**.
> En este caso colocaremos una carpeta llamada *****_index.files***** y bajo ella todos los ficheros que pretendamos dejar en descargas

Una vez colocada la carpeta con los ficheros, colocaremos en nuestro fichero *****md***** el shortcode
*El uso es con la siguiente sintaxis

`````go
{{%/* attachments sort="asc" /*/%}}
`````


#### extends


#### notice

#### mermaind







### Práctica
{{< alert title="Ahora practica tú " color="success" >}}
Accede a la información de de [shortcode de la plantilla de relearn](https://mcshelby.github.io/hugo-theme-relearn/shortcodes/)
Incluye en tu trabajo los elementos que a continuación se muestran 
1 Botones
2 Páginas de descargas
3 Acortar un texto con leer mas...
4 Texto remarcado como una noticia
5 Crear gráficos con mermaid (opcional)
6 tabs de diferentes elementos
Si tienes alguna duda, pregunta o envía un mensaje para aclarar. Mucho mejor usa el foro

{{</alert>}}