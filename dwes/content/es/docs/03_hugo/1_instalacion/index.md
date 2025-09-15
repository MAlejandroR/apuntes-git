---
title: "Instalación"
date: 2021-10-04T12:01:52+02:00
draft: false
weight: 21
icon: fas fa-cogs
description: >
  Instalación e inicio de herramientas para el desarrollo y configuración
---

{{% pageinfo %}}
:white_check_mark:
**Objetivos**

* Aprenderemos a instalar *hugo* y crear un **nuevo sitio web**
* :smile: qué bonito *es*
* No olvides, si se necesita, configurar el **path** del sistema para acceder desde cualquier invocación
* Gestionamos todo desde un **terminal** independientemente de usar linux o windows
* Verifica la versión instalada

---
**Páginas referenciadas**

* Web de visual code : https://code.visualstudio.com/
* Web de jetsbrain y phpstorm: https://www.jetbrains.com/
* hugo: https://gohugo.io

* página de snap : https://snapcraft.io/docs/snap-documentation

{{% /pageinfo %}}

---

### Instalación

Tiene instaladores para mac, windows y linux:

* [https://gohugo.io/getting-started/quick-start/#step-1-install-hugo](https://gohugo.io/getting-started/quick-start/#step-1-install-hugo)

{{% pageinfo %}}
Recuerda:

* Instalar la herramienta hugo
* No olvides, si se necesita, configurar el **path** del sistema para acceder desde cualquier invocación
* Gestionamos todo desde un **terminal** independientemente de usar linux o windows
* Verificamos la instalación con el comando

```bash
 hugo version
 ```

{{% /pageinfo %}}

{{% pageinfo %}}

**Instalación en terminal**
{{< tabpane >}}
{{< tab header="apt" lang="shell">}}
// Instalacion en ubuntu con apt (cuidado con la versión)
sudo apt-get install hugo
{{< /tab >}}
{{< tab header="snap" lang="bash">}}
// Instalacion en ubuntu con snap, recomendado, instala última versión
sudo snap install hugo --classic
{{< /tab >}}
{{< tab header="instalar chocolatey (windows)" lang="sh">}}
// Chocolat se instala en power shell por consola
Set-ExecutionPolicy Bypass -Scope Process -Force;
[System.Net.ServicePointManager]::SecurityProtocol =
[System.Net.ServicePointManager]::SecurityProtocol -bor 3072;
iex ((New-Object System.Net.WebClient).DownloadString('https://community.chocolatey.org/install.ps1'))

choco --version
{{< /tab >}}
{{< tab header="chocolatey (windows)" lang="javascript">}}
// Instalacion en Windows teniendo instalado chocolatey
choco install hugo -confirm
{{< /tab >}}
{{< /tabpane >}}
Si no tuviera <a href="https://snapcraft.io/docs/snap-documentation" target="_blank">snap</a> instalado,

```bash
sudo apt-get install snapd
```

{{% /pageinfo %}}

{{% pageinfo%}}

**Referencias para instalar en windows**
 ***
[Versiones de hugo para diferentes plataformas](https://github.com/gohugoio/hugo/releases)

{{% /pageinfo%}}
{{% alert title="snap" color="primary" %}}
Mejor instalamos con **snap** para obtener la versión última
{{% /alert %}}

Instalar con *apt-get* instala una versión 0.68 **Versión actual 0.134.3-**  
{{< alert title="Descarga del sitio oficial" color="warning" >}}
También puedes descargar el paquete de la web oficial del sitio de hugo  [Página de hugo](https://gohugo.io)
{{< /alert >}}

### Editor para el desarrollo

Interesante usar [Visual Code](https://code.visualstudio.com/), aunque para el desarrollo del curso, vamos a utilizar [
*phpstorm*](https://www.jetbrains.com/phpstorm/) de [jetbrains](https://www.jetbrains.com/)

{{< tabpane >}}
{{< tab header="Visual code" lang="shell">}}
sudo snap install code --classic
{{< /tab >}}
{{< tab header="phpstorm" lang="bash">}}
sudo snap install phpstorm --classic
{{< /tab >}}
{{< /tabpane >}}

Una vez instalado si escriben en el terminal ***code .*** te abre el editor y te carga el directorio actual

* Puedes abrir el terminal desde el entorno
* Puedes commitear desde el editor y subir a git *Esto ya lo veremos más adelante*
* Instalar muchos plugins según necesidades

### Crear un sitio nuevo

Mejor tener una carpeta concreta para los sitios que vayamos a crear.

En ella creamos un nuevo sitio con el comando *new* del [CLI de hugo](https://gohugo.io/commands/hugo/)

```bash
hugo  new site <nombre_del_sitio >
```
La instalación nos da información de que se ha creado el sitio nuevo y de los pasos a realizar para continuar con nuestro nuevo sitio web:
<img src ="images/hugo/funcionamiento.png" alt="funcionamiento"
height=900px/>
Una vez que creamos un sitio nuevo, observamos {{<color_green>}}que se crea una carpeta o directorio con el nombre del sitio creado{{</color_green>}}.

Dentro de ella vemos una estructura de
directorios[(Web de referencia sobre los directorios)](https://gohugo.io/getting-started/directory-structure/)  que hay
que entender:

{{< imgproc carpetas_hugo Fit "100000x700000 center" >}}
Listado de directorios creados
{{< /imgproc >}}

Aquí tienes un [artículo](https://desarrolloweb.com/articulos/componentes-principales-hugo-framework) muy claro sobre
los directorios creados.

* ***archetype***
  > En este directorio tendremos **los ficheros base** a partir de los cuales crearemos nuevos ficheros de contenidos usando los comandos
  de  hugo.
* ***content***
  > Aquí ubicaremos {{<color_green>}}los contenidos que queremos publicar{{</color_green>}}. Dejaremos todos los ficheros
  ***Markdown*** que constituirán contenido de nuestro sitio.
* ***data***
  > Carpeta para dejar ficheros con datos para, por ejemplo, rederizar posteriormente en nuestro sitio
  web.
  Puede ser un fichero *json* con información, un csv (podríamos consumir un csv de nuestro drive también) o una carpeta
  con fotos o imágenes, como veremos en un ejemplo.
* ***layouts***
  > Carpeta muy importante donde podremos establecer {{<color_green>}}la plantilla para nuestro sitio web{{</color_green>}}. Lo más habitial es
  utilizar una plantilla de partida, que estará ubicada en la carpete [theme](#theme), manteniendo la misma estructura,
  modificaremos ficheros del tema o layout base de nuestro sitio según nuestras necesidades o gustos. Se entenderá en el
  ejemplo correspondiente
* ***static***
  > {{<color_green>}}Ficheros estáticos{{</color_green>}} que vayamos usando en nuestro sitio, como imágenes, vídeos, los cuales
  pueden ser consumidos directamente por el sitio, sin ninguna necesidad de procesamiento previo (como fichero scss que
  tienen que ser transpilados a css, que deben de ir en la carpeta assets) Lo iremos viendo principalmente con imágenes
* ***asset***
  > Al igual que static ubicaremos {{<color_green>}}ficheros estáticos{{</color_green>}}, pero en este caso, antes de ser utilizados, {{<color_green>}}deben de ser  procesados{{</color_green>}}   de alguna forma y transpilados para utilizarse. Por ejemplo un fichero **sass** o **less**, para transformarse en un *
  *css**
  * ***theme***
  >   Esta carpeta es donde se va a ggestablecer el tema, layout o plantilla base a partir del cual se va a ver nuestro
    sitio.  Es una buena recomendación, especialmente al principio, partir de una plantilla ya hecha. Tenemos
    muchos [temas disponibles](https://themes.gohugo.io/)  en la página oficial de hugo. En el siguiente apartado
    comenzaremos instalando un tema para empezar a construir nuestro sitio web, es lo primero que hay que hacer.

### Práctica

{{< alert title="Ahora practica tú" color="success" >}}
:smiley:

* Crea un sitio nuevo con el nombre que quieras
* Entra en el directorio creado y observa las diferentes carpetas que tienes
* Una vez creado el sitio 
  {{< /alert >}}




    
