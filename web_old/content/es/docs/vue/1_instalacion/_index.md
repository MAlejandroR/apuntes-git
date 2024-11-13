---
title: "Instalacion"
date: 2023-04-08T18:21:47+02:00
draft: false
weight: 20

---

# Instalación en Laravel

Una vez creado el proyecto de laravel, instalamos la última versión de vue (marzo 2023, Vue 3)
Para ello hemos de instalarlo tanto para usarlo , como para que vite pueda hacer su transpilación

{{< highlight bash "linenos=table,anclorlinenos=true, hl_lines=3 7" >}}
npm install vue@next --save-dev
npm install @vitejs/plugin-vue
{{< / highlight >}}

## Modificando ficheros

Ahora toca invocarlo. Por un lado especificamos a vite que use este **framework**, por lo que accedemos al fichero de
configuración de vite

{{< highlight javascript "linenos=table,anclorlinenos=true, hl_lines=3 7" >}}
import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import vue from '@vitejs/plugin-vue'; //línea a añadir

export default defineConfig({
    plugins: [
        vue(), //Línea a añadir
        laravel({
                input: ['resources/css/app.css', 'resources/js/app.js'],refresh: true,
               }),
        ],
    });
{{< / highlight >}}

Ahora debemos cargar una instancia de vue en un fichero js que carguemos en nuestra página html. Para ello primero
cargamos una instacia de vue en '''''resources/js/app.js'''''

{{< highlight vue "linenos=table,anclorlinenos=true, hl_lines=" >}}
import {createApp} from "vue";
import {createApp} from "vue/dist/vue.esm-bundler";
createApp({
           
          }).mount("#app");

{{< / highlight >}}

* Ahora debemos instalar nuestro elemento con id **app** que hemos indicado en el método o evento **mount**
en nuestra página html, y en ella incluir este script

* En nuestra página **layout** que vamos a usar en todas las páginas de nuestro proyecto escribimos

{{< highlight html "linenos=table,anclorlinenos=true, hl_lines=7 9" >}}
<!doctype html>
<html lang="en">
<head>
<!-- código html con sintaxis blade-->
 @vite(["resources/css/app.css","resources/js/app.js" ])
 <body>
  <div id="app">
<!-- código html con sintaxis blade-->
  </div>
 </body>
</html>
``

{{< / highlight >}}



