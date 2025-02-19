+++
title = 'Arrays'
date = 2024-10-15T07:04:49+02:00
draft = false
icon = "fas fa-th-large"
weight = 140
+++

### Objetivos de este tema
<div class="iframe-container">
<iframe src="https://es.wikieducator.org/index.php?curid=6673" width="100%" height="1095">WikiEducator </iframe>
</div>

### Teoría sobre arrays en php
<div class="iframe-container"> 
<iframe src="https://es.wikieducator.org/index.php?curid=6674" width="100%" height="15171">WikiEducator </iframe>
</div>


### Ejercicio: Gestión de canales de tv
Se trata de realizar un programa que me muestre canales de televisión según la descripción que se muestra a continuación:

<div class="iframe-container"></div> 
<iframe src="https://es.wikieducator.org/index.php?oldid=31770" width="100%" height="603">WikiEducator </iframe>
</div>

{{< color >}}  Estructura general del Array {{< /color >}}

El array principal es un array indexado, donde cada elemento tiene las claves `name` y `channels`.


| Índice (Elemento) | Clave         | Descripción                                                        |
|--------------------|--------------|--------------------------------------------------------------------|
| `[0]`              | `name`       | Nombre del grupo de canales. Ejemplo: `'Grupo 1'`.                |
|                    | `channels`   | Array indexado que contiene los datos de los canales. Véase abajo. |
| `[1]`              | `name`       | Nombre del grupo de canales. Ejemplo: `'Grupo 2'`.                |
|                    | `channels`   | Array indexado que contiene los datos de los canales. Véase abajo. |

---



El array `channels`, dentro de cada elemento, contiene un listado de canales con la siguiente estructura:
; Estructura del elemento `channels` de cada elemento


| Índice (Canal) | Clave         | Descripción                                                                                  |
|----------------|--------------|----------------------------------------------------------------------------------------------|
| `[0]`          | `name`       | Nombre del canal. Ejemplo: `'La 1'`.                                                         |
|                | `web`        | URL del sitio web del canal. Ejemplo: `'https://www.rtve.es/play/videos/directo/la-1/'`.     |
|                | `logo`       | URL del logo del canal. Ejemplo: `'https://pbs.twimg.com/profile_images/899385012801470464/akSvNCqE_200x200.jpg'`. |
|                | `epg_id`     | Identificador del canal para la guía de programación. Ejemplo: `'La1.TV'`.                   |
|                | `options`    | Array indexado con opciones relacionadas. Contiene varios elementos, cada uno con 5 claves. Ejemplo: `[...]`. |
|                | `extra_info` | Array vacío para información adicional. Ejemplo: `[]`.                                       |
| `[1]`          | `name`       | Nombre del canal. Ejemplo: `'La 2'`.                                                         |
|                | `web`        | URL del sitio web del canal. Ejemplo: `'https

* Nos interesa el {{< color >}} name {{< /color >}}, la {{< color >}} web {{< /color >}} y el {{< color >}} web {{< /color >}} para nuestra aplicación


{{< imgproc array Fill "795x125" >}}

{{< /imgproc >}}

{{< color >}} Resultado {{< /color >}}:
{{< color >}} Opción 1  {{< /color >}} 
* La app, debe de mostrar agrupados los canales por temática (name del primer nivel)
* En cada nivel mostraremos la imagen del canal de forma que si hacemos click sobre ella, nos lleve a su url y podamos ver dicho canal.

{{< color >}} Opción 2 {{< /color >}}
* Un desplegable con los name de los canales (grupo de canales)
* Al seleccionar uno de ellos, nos mostrará los logos de los canales de ese grupo
* Se debe de quedar seleccionado dicho grupo

 {{% line %}}

### Anexo:

* ***Funciones estudiadas*** :
*  {{< color >}} array_map {{< /color >}} que usa callback en su argumento.
*  {{< color >}} array_fill {{< /color >}} para rellenar una función .
*  {{< color >}} range {{< /color >}}para crear una secuencia de valores en un array. 

#### Función `array_map`

{{<definicion title="array_map" icon="fas fa-code">}}
La función array_map aplica una función callback a cada elemento de uno o más arrays y devuelve un array con los resultados.
{{</definicion>}}

**Sintaxis:**
{{< highlight php "linenos=table, hl_lines=1" >}}
array_map(callable $callback, array $array, array ...$arrays): array
{{< /highlight >}}

**Ejemplo:**
{{< highlight php "linenos=table, hl_lines=2" >}}
function sumarUno($n) {
return $n + 1;
}

$resultado = array_map('sumarUno', [1, 2, 3]);
// Resultado: [2, 3, 4]
{{< /highlight >}}

Usamos un {{< color >}} callback {{< /color >}} para transformar los elementos.
Un callback representa un tipo de dato que corresponde al código de una función, es el tipo del parámetro (en lugar de ser de otro tipo el parámetro, como entero, real, ...)
{{% line %}}

#### Función `array_fill`
{{< definicion title="array_fill" icon="fas fa-clipboard" >}}
La función `array_fill` llena un array con valores específicos, comenzando desde un índice dado.
{{</definicion>}}

**Sintaxis:**
{{< highlight php "linenos=table, hl_lines=1" >}}
array_fill(int $start_index, int $count, mixed $value): array
{{< /highlight >}}

**Ejemplo:**
{{< highlight php "linenos=table, hl_lines=2" >}}
$resultado = array_fill(0, 5, 'PHP');
// Resultado: ['PHP', 'PHP', 'PHP', 'PHP', 'PHP']
{{< /highlight >}}

Se genera un array con un valor repetido {{< color >}} n {{< /color >}} veces.

{{% line %}}

#### Función range

{{< definicion title="range" icon="fas fa-list" >}}
La función range crea un array con una secuencia de valores entre un inicio y un final, opcionalmente con un paso.
{{</definicion>}}

**Sintaxis:**
{{< highlight php "linenos=table, hl_lines=1" >}}
range(mixed $start, mixed $end, int|float $step = 1): array
{{< /highlight >}}

**Ejemplo:**
{{< highlight php "linenos=table, hl_lines=2" >}}
$resultado = range(1, 10, 2);
// Resultado: [1, 3, 5, 7, 9]
{{< /highlight >}}

Genera un {{< color >}} array secuencial {{< /color >}} entre valores.

