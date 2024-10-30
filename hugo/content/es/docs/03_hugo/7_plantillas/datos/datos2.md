---
title: "Datos2"
date: 2021-10-06T14:41:37+02:00   
mensaje: "Página especial para las fotos en `/layouts/docs/datos2.html`"
urldatos: "https://docs.google.com/spreadsheets/d/e/2PACX-1vQbi7wkOO7rqoAdtfGK-uzL03LUCR8VIh8MCxGIgSpdjD8RMjirVsJanKEiwoPXusfCLFjeji1Dt0zS/pub?gid=0&single=true&output=csv"
draft: true
layout: datos2
---
# Consumir ficheros de un directorio
En este caso vamos a tener un fichero con imágenes o fotografías  en un directorio
Podemos crear un fichero {{<color>}}json o yaml o toml{{</color>}} para especificar la ubicación de los ficheros y los datos que queramos sobre cada uno de ellos.
En este caso creamos las imágenes en {{<color>}}/static/images/carousel{{</color>}}
{{< alert title="Comentario" color="warning" >}}
He creado con nombre carousel, pues pretendía que se viesen como una galería de imágenes usando este efecto visual de bootstrap, pero no he conseguido cargarlo. Pendiente de modificarlo, pero dejo este ejemplo sin visualización de carousel.
{{< /alert >}}
{{% pageinfo%}}
**Ficheros de imágenes**
 ***
![Ficheros de imágenes para ver](/images/relearn/data/imagenes.png)
{{% /pageinfo%}}
{{% pageinfo%}}
**Creamos la plantilla content/....../carousel.md**
 ***
```toml
 ![]()
```
{{% /pageinfo%}}
{{% pageinfo%}}
**Creamos la plantilla html /layoout/_defoult/carousel.html**
 ***

```html
{{- partial "header.html" . }}

{{ partial "content.html" . }}

<!-- SECCION PARA CARGAR LAS IMÁGENES-->
<div id="mic" class="carousel slide " data-ride="carousel">
    <div class="carousel-inner">
        {{ range $elem_index, $elem_val := .Site.Data.carrusel }}
        <div class='carousel-item {{ if eq $elem_index "1" }} active {{ end }}'>
            <img class="d-block  w-100" src="{{ .image  | relURL }}"  alt="{{ .name }}">
        </div>
        {{ end }}
    </div>
</div>


<footer class="footline">
  {{- with .Params.LastModifierDisplayName }}
  <i class='fas fa-user'></i> <a href="mailto:{{ $.Params.LastModifierEmail }}">{{ . }}</a> {{ with $.Date }} <i class='fas fa-calendar'></i> {{ .Format "02/01/2006" }}{{ end }}
  {{- end }}
</footer>
{{- partial "footer.html" . }}

```
{{% /pageinfo%}}

Y creamos los ficheros en la carpeta de {{<color>}}data{{</color>}} que van a referenciar a cada una de las imágenes. Lo vamos a establecer con formato {{<color>}}json{{</color>}}
{{% pageinfo%}}
**Listado de ficheros json para referenciar las imágens**
 ***
![Listado de ficheros para referenciar imágenes local](/images/relearn/data/ficheros_json_imagenes.png)
{{% /pageinfo%}}
El contenido de estos ficheros es igual salvo que cada uno referencia a una images
```json
{
  "name":"imagen 1",
  "image":"/images/carrusel/img1.jpg"
}
```
