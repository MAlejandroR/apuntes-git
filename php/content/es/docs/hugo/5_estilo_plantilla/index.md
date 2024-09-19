---
title: "Personalizar la plantilla"
date: 2021-10-22T16:23:31+02:00   
draft: false
description: "Cómo modificar y personalizar la plantilla o tema"
weight: 25
---

{{% pageinfo %}}
:white_check_mark:
**Objetivos**
* Vamos a modificar la plantilla utilizada
* Siempre se podrá hacer, pero en cada plantilla de una forma
* Acceder siempre a la información de la plantilla
* Modificar el logo, menú, etc
---
**Páginas referenciadas**
* En este caso referenciamos el tema [**relearn**](https://mcshelby.github.io/hugo-theme-relearn/basics/customization/) 
{{% /pageinfo %}}

## Qué partes hay en la plantilla
Debemos identificar las partes de una plantilla. Independientemente de la plantilla utilizada podemos hablar de:
1. Logo
2. Colores usados en el estilo
3. Menú principal
Identifiquemos esos elementos en nuestra plantilla y veamos cómo modificarlos para personalizarla a nuestro gusto.
  
En la imagen siguiente hemos identificado diferentes partes en la plantilla que vemos tras instalarla, sin ninguna modificación.

 **Partes de la plantilla**
___

{{< imgproc partes_plantilla_estilo Fit "800x1000 center" >}}

{{< /imgproc >}}
 

*******

### Logo
En esta plantilla, **relearn**,  el logo se carga a patir de un **partial**.
La carpeta {{<color>}}partial{{</color>}}
, va a contener ficheros html que serán parte una  página html, de forma que los podré invocar cuando los necesite. Por ejemplo un **footer.html** o un **header.html**

**Fichero logo.html del partial en relearn**
{{< imgproc  partial_logo Fit "400x600 center" >}}
{{< /imgproc >}}


En este caso la ubicación es {{<color>}}themes/layoout/partial/logo.html{{</color>}}

Ahora lo que hay que hacer es copiar el fichero en el directorio layout y modificar incluyendo el logo que queremos que tenga, que irá ubicado en la carpeta {{<color>}}static/images{{</color>}}

**Ficheros para establecer nuestro logo** 
___ 


{{< imgproc ficheros_logo Fit "600x700 center" >}}

{{< /imgproc >}}
Modificamos el fichero actualizando al logo que queramos. En este caso el logo se rederiza a partir de un elemento ***{{<color>}}svg{{</color>}}***.
Copiamos nuestro logo en la carpeta static y lo especificamos en un elemento {{<color>}}img{{</color>}}
  
Para ello hacemos un diseño de logo. [(hay muchas web gratuitas para ello)](https://www.logaster.com.es/logo/) 

Luego modificamos el fichero {{<color>}}logo.html{{</color>}} y sustituimos el elemento {{<color>}}svg{{</color>}} por un elemento {{<color>}}img{{</color>}}
```html
<!--Lo anterior no lo escribo ....-->
  <a id="logo"
            href="{{ .Site.Params.landingPageURL | default "/" | relLangURL }}"
            style="
              color: #3d414d;
              font-family: 'Novacento Sans Wide', 'Helvetica', 'Tahoma', 'Geneva', 'Arial', sans-serif;
              font-size: 30px;
              font-weight: bold;
              margin-top: -2px;
            ">
                <img src="/images/logo.png" alt="Logo del ciclo">
            Desarrollo Web
          </a>


Y nos quedará la página con el logo actualizado
```

**Sitio web con el logo actualizado**
____

{{< imgproc sitio_web_logo Fit "600x800 center" >}}

{{< /imgproc >}}
 

### Menú
El menú es una sección muy importante. En esta plantilla el menú va a estar ubicado en la parte izquierda de la plantilla.
Para añadir/modificarlo, debemos especificarlo en el fichero {{<color>}}config.toml{{</color>}}, añádiendo los elementos {{<color>}}[[menu.shortcuts]]{{</color>}}, para cada item que queremos añadir.
Por ejemplo, vamos a añadir 3 items
```toml
[[menu.shortcuts]]
name="<i class='fab fa-php'></i>   Lenguaje php"
identified=""
url="https://php.net"
weight=1

[[menu.shortcuts]]
name="<i class='fab fa-wikipedia-w'></i>   Wiki del curso"
identified=""
url="https://es.wikieducator.org/Usuario:ManuelRomero/ProgramacionWeb/Contenido"
weight=2

[[menu.shortcuts]]
name="<i class='far fa-question-circle'></i>   Ejercicios resueltos"
identified=""
url="http://manuel.infenlaces.com/dwes/ejercicios/"
weight=3
```
Y vemos cómo se genera el menú en la parte izquierda

**Menú principal ubicado en la parte izquierda**
***
{{< imgproc menu_izquierdo Fit "400x600 center" >}}

{{< /imgproc >}}



{{< alert title="Observa insertar icono" color="warning" >}}
Hugo integra los iconos [fab awesome](https://fontawesome.com/v5.15/icons?d=gallery&p=2&m=free) que son free, utilízalos para tener mejor visualización de tu sitio
{{< /alert >}}

El título del menú se coge del fichero de traducción ubicado en **theme/relearn/i18n/xx.toml**, donde xx es el idioma establecido.
Posteriormente veremos el tema de traducción y abordaremos esta cuestión

El parámetro que establece la traducción para este título de menú es el siguiente que estableceremos en **/i18n/es.toml**
```html
[Shortcuts-Title]
other = "Más opciones"
```
Debemos también establecer el idioma por defecto en el fichero de configuración **config.toml**
```toml
defaultContentLanguage="es"
```

**Menú con título establecido**
***

{{< imgproc menu_titulo Fit " 500x600 center" >}}

{{< /imgproc >}}


### Estilo
Esta plantilla tiene hasta tres estilos de colores diferentes preparados. Para utilizarlos basta con establecer el valor correspondiente de la variable {{<color>}}themeVariant{{</color>}} en el fichero de configuración {{<color>}}config.toml{{</color>}}. Los valores permitidos son {{<color>}}red, green, blue{{</color>}}

```toml
[params]
  themeVariant = "blue" or "green" or "red"
```
| Red | Blue | Green| Default|
|---|---|---|---|
| themeVariant = "red"| themeVariant = "blue" |themeVariant = "green"|themeVariant = ""|
|{{< imgproc style_red Fit " 200x300 center" >}}{{< /imgproc >}}|{{< imgproc style_blue Fit " 200x300 center" >}}{{< /imgproc >}}|{{< imgproc style_green Fit " 200x300 center" >}}{{< /imgproc >}}|{{< imgproc style_default Fit " 200x300 center" >}}{{< /imgproc >}}|

***Modificar los colores de fondo***
El color se carga, ya que en realidad lo que hacemos es establecer los **css** concretos según el nombre. Los podemos ver en la carpeta de **relearn** como muestra la figura siguiente


**Ficheros con diferentes temas**
 ***

 {{< imgproc temas Fit "600x700 center" >}}
 
 {{< /imgproc >}}


Si copiamos el fichero en nuestra ubicación **static/css/theme**También podemos crear nuestros propios ficheros css y cargarlos en nuestro proyecto, o modificar los valores de variables establecidos en el fichero de estilo css. Para ilustrar esta modificiación, copiamos en nuestro directiro **./static/css** el fichero de variables css y modificamos el color de fondo donde se ubica el menú que estamos trabajando, colocando otro color.
Vamos a copiar **/themes/relearn/static/css/theme-relearn**  en **/static/css/theme-dwes.css**
Ahora modificamos alguna de las variables de este tema y en el fichero de configuración especificamos que usamos este tema
```toml
[params]
  themeVariant = "dwes"
```

Por otro lado copiamos también el fichero **theme.css** por si queremos modificar algún elemento más.
Tras modificar dos colores de fondo bg y el color de la letra del título queda así la página 

 **Nuevo estilo de la página **
 ***

 {{< imgproc pagina_nuevo_estilo Fit "800x1000 center" >}}

 
 {{< /imgproc >}}
### Search
Para modificar este botón accedemos a nuestro nuevo theme-dwes.css y modificamos las variables que afectan a search, según nuestro gusto
### Home
Para modificar el home, debemos hacerlo desde el fichero de configuración.
En este caso, como tenemos configurado el idioma español, para el título del menú, debemos especificar estas variables dentro de una sección de lenguaje
Los parámetros modificados son los siguientes
```toml
[Languages]
[Languages.es]
landingPageURL = "http://cpilosenlaces.com"
landingPageName = "<i class='fas fa-university'></i> CPI Los Enlaces"
```
Si no hubiéramos configurado el idioma, no sería necesaria la sección

 **Estilo de la página con el home modificado**
 ***

 {{< imgproc pagina_home_modificado Fit "900x1000 center" >}}
 
 {{< /imgproc >}}
 
### footer
El footer es esta plantilla, corresponde a un partial, por lo que tendríamos que acceder a él, copiarlo en nuestro directorio  y modificarlo.
El fichero  que muestra el footer en la parte del menú se llama {{<color>}}menu-footer.html{{</color>}}
Una pequeña modificación y observamos la actualización en la página

 **Footer del  menú modificado**
 ***


 {{< imgproc actualizado_footer_menu Fit " 700x900 center" >}}
 
 {{< /imgproc >}}
### Práctica
{{< alert title="Ahora practica tú" color="success" >}}
:smiley:
**Modifica la plantilla según se ha visto en este tema**
1. Cambia el logo.
2. Establece otros colores según consideres.
   
3. Añade un menú principal
   * Que tenga 4 opciones al menos
   * Establece icono de fan awesome
   * Establece un título para ese menú 
4. Modifica el footer de la página.

{{< /pageinfo >}}