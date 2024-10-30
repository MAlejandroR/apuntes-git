---
title: "Contenido"
date: 2021-10-04T13:19:24+02:00
draft: false
weight: 23
icon: fas fa-pencil-alt
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
Ahora que tenemos una plantilla, queda lo principal, que es {{<color_green color="danger">}}aportar contenido a nuestro sitio web.{{</color_green>}}
{{<color_green>}}{{</color_green>}}

Son sitios estáticos, por lo que nuestro objetivo es aportar {{<color_green>}}ficheros de texto con datos, información, imágenes, efectos visuales{{</color_green>}} para que sean publicados en la web.

La idea va a ser aportar {{<color_green>}}ficheros en formato [markdown]() {{</color_green>}}cuyo contenido queremos  renderizar.

## ¿Qué estructura tiene el contenido de las páginas?
{{< alert title="Organizando contenidos" color="warning" >}}
**Esto implica una organización**    
> No podemos poner páginas sin mas.
{{< /alert >}} 
* En Hugo el contenido {{<color_green>}}se organiza como luego se va a ver{{</color_green>}} en la web. 
 
* Anidamos el contenido {{<color_green>}}en subdirectorios (**secciones**){{</color_green>}} (directorios serán carpetas que iremos creando) :
```bash
  content/directorios
  ```
* Cada página de contenido va a tener  en la parte superior una zona especial, llamada {{<color_green>}}[front-matter](https://gohugo.io/content-management/front-matter/){{</color_green>}} 
* Cada página se creará siguiendo un patrón o modelo especificado en la carpeta {{<color_green>}}[archetypes](https://gohugo.io/content-management/archetypes/){{</color_green>}}
 {{< imgproc archtype Fill "300x100" >}}
 
 {{< /imgproc >}}
 
* Plantillas específicas para cada modelo

