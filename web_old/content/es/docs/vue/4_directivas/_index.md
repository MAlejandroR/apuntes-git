---
title: "Directivas de vue"
date: 2023-04-08T18:21:47+02:00
draft: false
weight: 40
---

## Directivas 

Son palabras reservadas que nos van a permitir en la parte del html (vista) usar conceptos de la parte del controlador.

La reacción es en dos direcciones, es decir cualquier cambio que hagamos en la parte del html a una variable se reflejará inmediatamente en el controlador y viceversa.

Por ello se dice de **Vue** se dice que es un framework reactivo en dos direcciones
{{< imgproc mvvm Fit "100000x700000 center" >}}
modelo vista - vista modelo
{{< /imgproc >}}


Las directivas en Vue empiezan por la letra **v-**

{{< imgproc directivas Fit "100000x700000 center" >}}
directivas Vue
{{< /imgproc >}}



Vamos a utilizarlas en nuestro componentes y las vamos a explicar:

### v-text o {{}}
Con esta directiva visalizamos el valor de una variable
En nuestro caso queremos mostar el valor de la variable tabla
{{< highlight html "linenos=table,anclorlinenos=true, hl_lines= 4" >}}
<template>
<table>
    <caption>
        <div v-text=tabla></div>
    </caption>
    <tr>
        <th>
<!-- ... resto -->
{{< / highlight >}}

O bien
{{< highlight html "linenos=table,anclorlinenos=true, hl_lines= 4" >}}
<template>
<table>
    <caption>
        {{tabla}}
    </caption>
    <tr>
        <th>
<!-- ... resto -->
{{< / highlight >}}

Usaremos el formato de sintaxis de plantillas o mustache que son las dobles brakets **{{}}**.
No confundir con los dobles brakets de laravel.

### v-for
Para iterar sobre una lista o array de valores.
En este caso tenemos dos arrays, uno indexado de nombres de campos **campos** y otro llamado **filas** que es un array de objetos, donde cada objeto es una tupla o fila de la tabla en la base de datos que estemos visualizando

Para renderizar los campos
{{< highlight  html "linenos=table,anclorlinenos=true, hl_lines=7 8 9" >}}
<template>
<table>
    <caption>
        {{tabla}}
    </caption>
    <tr>
        <th   v-for="campo in campos">
            {{ campo }}
        </th>
    </tr>


{{< / highlight >}}
En el caso de las filas, hay que realizar una doble iteración. Por un lado recorremos cada fila y creamos un **tr**, por otro lado recorremos cada campo para visualizar en un **td**
{{< highlight  html "linenos=table,anclorlinenos=true, hl_lines=12 13 14 15 16" >}}
<template>
<table>
    <caption>
        <div v-text=tabla></div>
        {{tabla}}
    </caption>
    <tr>
        <th   v-for="campo in campos">>
            {{ campo }}
        </th>
    </tr>
    <tr v-for="fila in filas">
        <td v-for="valor in fila">
             {{valor}}
        </td>
    </tr>

</table>
</template>
{{< / highlight >}}