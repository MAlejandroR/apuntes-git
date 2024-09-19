---
title: "Componete Tabla"
date: 2023-04-08T18:21:47+02:00
draft: false
weight: 30

---

# Crear un componente tabla 

Vamos a crear un componente para renderizar en una tabla el resultado de una consulta de html

Además le dotaremos de una serie de método que se ejecutarán en el cliente como es ordenar por un campo concreto o bien filtar las filas por valores que insertemos en una caja de texto

{{< imgproc tabla_1 Fit "100000x700000 center" >}}
Ejemplo de tabla que queremos implementar
{{< /imgproc >}}


La ventaja es evidente: tendremos un componente que podremos usar en cualqueir circunstancia que lo necesitemos, y si necesitamos más funcionalidad, simplemente la añadiremos

## Crear el componente.

Ahora hemos de crear un componente vue en el que vamos a renderizar las  filas y la cabecera del resultado de una consulta en la base de datos.

Crearemos un componente llamado **listado_tabla.vue** en **resources/js/componets/listado_tabla.vue** con el código base de una tabla

{{< highlight html "linenos=table,anclorlinenos=true, hl_lines=4 8 12 14" >}}
<template>
<table>
    <caption>
        <!--Por ejemplo el nombre de la tabla-->
    </caption>
    <tr>
        <th>
            <!--Aquí las nombres de los campos -->
        </th>
    </tr>
    <tr> 
        <!--Tantas filas en la tabla como filas haya que listar-->
        <th>
        <!--De cada fila visualizo cada valor-->
        </th>
    </tr>
</table>
</template>

<script>
export default {
    name: "listado_tabla"
}
</script>

<style scoped>

</style>
{{< / highlight >}}

En las líneas comentadas y seleccionadas es donde tendremos que poner valores según los casos, por lo que evidencia los valores que he de pasar del **back** a través de variables

Ahora hay que indicar en el fichero **resources/js/app.js** que vamos a utilizar el componente creado
{{< highlight javascript "linenos=table,anclorlinenos=true, hl_lines=3 8" >}}
import {createApp} from "vue/dist/vue.esm-bundler";

import listado_tabla from "./components/listado_tabla.vue";
import saludo from "./components/saludo.vue";

createApp({
         components:{
                listado_tabla,
                saludo
         }
}).mount("#app");
{{< / highlight >}}
## Generarando datos (back)

Ahora necesitamos generar los datos. Esto lo hacemos en el controlador, el cual los pasa al retornar la vista

Por lo tanto necesitamos la siguiente interacción entre el back y el front. Es muy importante afianzar esta idea y ser consciente de donde estoy en cada momento
![Listado tabla](/images/listado_tabla_1.png)

{{< imgproc listado_tabla_1 Fit "100000x700000 center" >}}
Listado de la tabla
{{< /imgproc >}}
Valores que genero en el back y se los paso al front

Si concretamos y ponemos nombre a las variables para empezar a programar, una opción sería: 

{{< imgproc listado_tabla_2 Fit "100000x700000 center" >}}
Listado de la tabla
{{< /imgproc >}}

Dejamos establecidas estas variables para el componente vue
{{< imgproc controlador_vista Fit "100000x700000 center" >}}
Controlador - Vista
{{< /imgproc >}}

Es importante ver que la forma en la que trabajamos con datos estructurados en el back y en el front no son la misma, por lo que hay que buscar un punto de unión, y esto es justo lo que hacemos pasar la informacion serializada para podre reconstruir fácilmente un json
{{< highlight php "linenos=table,anclorlinenos=true, hl_lines=8 10 12 13 14 15" >}}
class AlumnoController extends Controller
{
/**
* Display a listing of the resource.
*/
public function index()
{
       $alumnos = Alumno::all();
       //Una manera de obener los nombres de la columna
        $campos = array_keys($alumnos[0]->getAttributes());
        
        $tabla ="Alumnos";
        return view("alumnos.listado", ['filas'=> $alumnos,
                                             'campos'=>$campos,
                                             'tabla'=>$tabla]);
    }

{{< / highlight >}}

{{< imgproc serialize_3 Fit "100000x700000 center" >}}
Proceso de serializacion
{{< /imgproc >}}


## La vista
En la vista recibimos los datos del controlador y los cargamos para entregarlos al cliente
La imagen anterior deja establecido dicha idea
{{< highlight html "linenos=table,anclorlinenos=true, hl_lines=3" >}}
@extends ("layout");
@section("contenido")
@extends ("layout");
@section("contenido")
<listado_tabla filas_serializadas=@json($filas) campos_serializados=@json($campos) tabla={{$tabla}}>
@endsection

@endsection
{{< / highlight >}}
## Directivas de Vue
Ahora tenemos que recoger los valores 
