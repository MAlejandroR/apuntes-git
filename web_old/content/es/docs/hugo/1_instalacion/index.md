---
title: "Instalación"
date: 2021-10-04T12:01:52+02:00
draft: false
weight: 21
description: >
 Instalación e inicio de herramientas para el desarrollo y configuración
---

{{% pageinfo %}}
:white_check_mark:
**Objetivos**
* Aprenderemos a instalar *hugo* y crear un **nuevo sitio web**
* No olvides, si se necesita, configurar el **path** del sistema para acceder desde cualquier invocación
* Gestionamos todo desde un **terminal** independientemente de usar linux o windows
* Verifica la versión instalada
---
**Páginas referenciadas**
* Web de visual code : https://code.visualstudio.com/
* hugo: https://gohugo.io 
* Web de jetsbrain y phpstorm: https://www.jetbrains.com/
* página de snap : https://snapcraft.io/docs/snap-documentation


{{% /pageinfo %}}

---
## Instalación 
Tiene instaladores para mac, windows y linux:
* [https://gohugo.io/getting-started/quick-start/#step-1-install-hugo](https://gohugo.io/getting-started/quick-start/#step-1-install-hugo)


{{% pageinfo %}}
Recuerda:
* Instalar la herramienta hugo
* No olvides, si se necesita, configurar el **path** del sistema para acceder desde cualquier invocación
* Gestionamos todo desde un **terminal** independientemente de usar linux o windows
* Verifica la versión instalada
{{% /pageinfo %}}

{{< tabpane >}}
{{< tab header="apt-get" lang="shell">}}
    sudo apt-get install hugo
  {{< /tab >}}
  {{< tab header="snap" lang="shell">}}
    sudo snap install hugo --classic
  {{< /tab >}}
{{< /tabpane >}}
Si no tuviera [snap](https://snapcraft.io/docs/snap-documentation) instalado
```bash
sudo apt-get install snapd
```
{{% pageinfo%}}

 **Referencias para instalar en windows**
 ***
 [Blog instalar hugo en windows](https://imalexissaez.github.io/2018/07/08/instalando-hugo-en-windows/)

 [Versiones de hugo para diferentes plataformas](https://github.com/gohugoio/hugo/releases)
{{% /pageinfo%}}
{{% pageinfo %}}
*Mejor instalamos con **snap** para obtener la versión última
{{% /pageinfo %}}

Instalar con *apt-get* instala una versión 0.68 **Versión actual v0.103.1-**  
{{< alert title="Descarga del sitio oficial" color="warning" >}}
También puedes  descargar el paquete de la web oficial del sitio de hugo  [Página de hugo](https://gohugo.io)
{{< /alert >}}


## Editor para el desarrollo

Interesante usar [Visual Code](https://code.visualstudio.com/), aunque para el desarrollo del curso, vamos a utilizar [*phpstorm*](https://www.jetbrains.com/phpstorm/) de [jetbrains](https://www.jetbrains.com/)
```bash
sudo snap install code --classic
```

Una vez instalado si escriben en el terminal ***code .*** te habre el editor y te carga el directorio actual

* Puedes abrir el terminal desde el entorno
* Puedes commitear desde el editor y subir a git *Esto ya lo veremos más adelante*
* Instalar muchos plugins según necesidades

## Crear un sitio nuevo
Mejor tener una carpeta concreta para los sitios que vayamos a crear.

En ella creamos un nuevo sitio con el comando *new* del [CLI de hugo](https://gohugo.io/commands/hugo/)

```javascript
$ hugo new site <nombre_del_sitio>
```
Una vez que creamos un sitio nuevo, observamos cómo se genera una carpeta o directorio con el nombre del sitio creado. Dentro de ella vemos una estructura de directorios[(Web de referencia sobre los directorios)](https://gohugo.io/getting-started/directory-structure/)  que hay que entender.

{{< imgproc directory_tree_new_project Fit "100000x700000 center" >}}
Listado de directorios creados
{{< /imgproc >}}

Aquí tienes un [artículo](https://desarrolloweb.com/articulos/componentes-principales-hugo-framework) muy claro sobre los directorios creados.
* ***archetype***
  En este directorio tendremos los ficheros base a partir de los cuales crearemos nuevos ficheros usando los comandos de hugo
* ***content***
  Esta es la carpeta donde ubicaremos los contenidos que queremos publicar. Aquí dejaremos todos nuestros ficherso ***markdown*** que contendrán el contenido de nuestro sitio
* ***data***
  Carpeta para dejar ficheros que van a contener datos para, por ejemplo, rederizar posteriormente en nuestro sitio web. Puede ser un fichero *json* con información, un csv (podríamos consumir un csv de nuestro drive también) o una carpeta con fotos o imágenes, como veremos en el ejemplo
* ***layouts***
  Esta es una carpeta muy importante donde podremos establecer la plantilla para nuestro sitio web. Lo más habitial es utilizar una plantilla de partida, que estará ubicada en la carpete [theme](#theme), manteniendo la misma estructura, modificaremos ficheros del tema o layout base de nuestro sitio  según nuestras necesidades o gustos. Se entenderá en el ejemplo correspondiente

* ***static***
  Aquí dejaremos todos los ficheros estáticos que vayamos usando en nuestro sitio, como imágenes, vídeos, los cuales pueden ser consumidos directamente por el sitio, sin ninguna necesidad de procesamiento previo (como fichero scss que tienen que ser transpilados a css) Lo iremos viendo principalmente con imágenes
* ***asset***
  Al igual que static ubicaremos ficheros  estáticos, pero en este caso, antes de ser utilizados, deben de ser procesados de alguna forma y transpilados para utilizarse. Por ejemplo un fichero **sass** o **less**, para transformarse en un **css**
* ***theme***
 Esta carpeta es donde se va a establecer el tema, layout o plantilla base a partir del cual se va a ver nuestro sitio. Es una buena recomendación, especialmente al principio, partir de una plantilla ya hecha. Tenemos muchos [temas disponibles](https://themes.gohugo.io/)  en la página oficial de hugo. En el siguiente apartado comenzaremos instalando un tema para empezar a construir nuestro sitio web, es lo primero que hay que hacer.

### Práctica
{{< alert title="Ahora practica tú" color="success" >}}
:smiley:
* Crea un sitio nuevo con el nombre que quieras
* Entra en el directorio creado y observa las diferentes carpetas que tienes
{{< /alert >}}




    
