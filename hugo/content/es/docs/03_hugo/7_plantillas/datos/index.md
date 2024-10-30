---
title: "Datos externos"
date: 2021-10-04T13:20:01+02:00
draft: false
weight: 28
icon: fas fa-file-alt
---

# Consumir datos de ficheros con estructura

La ubicación del fichero debe de estar en ***data***
Podemos consumir datos de diferentes fuentes, entro otras opciones:
* Un fichero json
* Fichero CSV
* Un directorio con imágenes 
* Un fichero csv compartido en drive

Para ilustrar esto, a ubicar en el directorio {{< color >}} data {{< /color >}} un fichero de cadenas de tv sacado de github y ubicado en un proyecto de github
 https://github.com/MAlejandroR/staticSite/blob/main/data/tv.json


Este fichero, es un array de elemetos {{< color >}} json {{< /color >}} (parejas variable valor en un fichero)
Cada json contiene **name** y **channels** y channels es un array con todos los canales de ese tipo de canales con los siguientes datos:
 * name
 * web
 * logo
 * epg_id
 * options

 Ahora vamos a crear {{< color >}} una plantilla {{< /color >}} que permita visualizar el contenido del array

 Para ello vamos a crear una plantilla ***html*** cuyo contenido sea recorrer el array, por ejemplo la llamamos {{<color>}}datos_tv.html{{</color>}}. La debemos de ubicar bajo el directorio {{<color>}}_layouts/_defaults{{</color>}}, siguiendo las especificaciones vistas en el apartado anterior.
{{% pageinfo%}}
 **El código de la plantilla **
 ***
  ```html
 <ul>
    {{ range  .Site.Data.tv }}
        <h1><li>  {{ .name }}</li></h1>
        {{ range .channels }}
            <a href="{{ .web}}" >
            <img src="{{.logo}}" alt="{{ .name }}">
            </a>
   
         {{ end }}
    {{ end }}
       </ul>
 ```
{{% /pageinfo%}}
{{% pageinfo%}}
 **La ubicación del fichero**
 ***
 {{< imgproc plantilla_tv Fill "251x89" >}}
 
 {{< /imgproc >}}
{{% /pageinfo%}}
 Hay que entender el doble bucle que hay cuya sintaxis, en lugar del for al que estamos acostumbrados es **range**.

En definitiva lo que hace es recorrer el array inicial y para cada elemento recorro el elemento *channels* que como se puede ver es otro array


Observa la sintaxis y mira cómo cada **range** tiene su **end**


Una vez que hemos creado la plantilla, vamos a consumirla desde un fichero de markdown.

Lo único que tendremos que hacer es cargar esa página con la plantilla que hemos creado previamente.

Cómo queremos que se cargue la misma estructura que todas las plantillas de nuestro sitio web, debemos buscar la plantilla base e incluir los elementos en esta plantilla

La plantilla base de las páginas está en {{<color>}}themes/layouts/_defaults/single.html{{</color>}} cuyo contenido editamos y copiamos en nuestra plantilla de {{<color>}}datos_tv.html{{</color>}}
{{% pageinfo%}}
 **Plantilla de datos_tv.html incluyendo la plantilla base.html**
 ***
```html
{{- partial "header.html" . }}
<hr />
{{ partial "content.html" . }}
<hr />
<hr />

<ul>
    {{ range  .Site.Data.tv }}
    <h2><li>  {{ .name }}</li></h2>
    {{ range .channels }}
    <a href="{{ .web}}" >
        <img src="{{.logo}}" alt="{{ .name }}">
    </a>

    {{ end }}
    {{ end }}
</ul>
<footer class="footline">
    {{- with .Params.LastModifierDisplayName }}
    <i class='fas fa-user'></i> <a href="mailto:{{ $.Params.LastModifierEmail }}">{{ . }}</a> {{ with $.Date }} <i class='fas fa-calendar'></i> {{ .Format "02/01/2006" }}{{ end }}
    {{- end }}
</footer>
{{- partial "f
```
{{% /pageinfo%}}
Ahora creamos la página markdown que usará esta plantilla, la creamos bajo practica con el comando de {{<color>}}hugo cli{{</color>}}
```shell
hugo new static/practica/datos.md
```
{{% pageinfo%}}
 **página markdown que usa esta plantilla datos.md**
 ***
 ```markdown
---
title: "Obtener Json"
date: 2021-10-21T13:31:19+02:00
draft: false
layout: datos_tv
---
# Listado de canales de tv
```
{{% /pageinfo%}}

Vemos que especificamos en el front matter la variable {{<color>}}layout{{</color>}}. El resultado de la ejecución la podemos ver:

{{% pageinfo%}}
 **El resultado de la ejecución **
 ***
 {{< imgproc canales_tv Fill "1340x970" >}}
 -
 {{< /imgproc >}}
{{% /pageinfo%}}

### Práctica
{{< alert title="Ahora practica tú" color="success" >}}
:smiley:
**Carga el ficheros de datos **

1. Carga el fichero de canales visto en este tema
2. Crea un directorio con imágenes y muestralas
3. Investiga e intenta cargar los datos de un fichero csv que tengas en tu drive   

{{< /pageinfo >}}

















