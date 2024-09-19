---
title: "Componentes"
date: 2023-04-08T18:21:47+02:00
draft: false
weight: 30

---



# Idea de un componenten el Laravel
{{%pageinfo%}}
 Un Componente html va a ser un fichero en el que vamos a especificar los tres aspectos fundamentales en un desarrollo html del cliente:
{{% /pageinfo%}}


* Comportamiento (Código js)
* Datos o información (código html)
* Estilo (Css)

La estructura del fichero va a tener esta forma
{{< highlight html "linenos=table,anclorlinenos=true, hl_lines=" >}}
<template>
  <!-- Código HTML -->
</template>

<script>
  // Código Javascript
</script>

<style>
  /* Código CSS */
</style>

{{< / highlight >}}

*Una vez creado el fichero, lo podremos invocar en nuestra página html. Por ejemplo si el fichero anterior lo llamáramos '''''cronmetro.vue''''',
{{< highlight html "linenos=table,anclorlinenos=true, hl_lines=" >}}
<cronometro></cronometro>

{{< / highlight >}}
</source>
Los ficheros han de tener extensión vue, y  normalmente los ubicaremos en una carpeta (p.e. ./componentes)


Crearemos componentes para especificar diferentes elementos con comportamiento que vamos a poder intergrar en nuestra página html
