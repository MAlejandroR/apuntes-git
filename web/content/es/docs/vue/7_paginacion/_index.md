---
title: "Paginación con vue y taildwind"
date: 2023-04-08T18:21:47+02:00
draft: false
weight: 70

---

## Instalar Paginación en tailwind

Para usar la paginación, ahora tendremos que hacer unas adaptaciones para que pueda funcionar, ya que la interacción entre cliente y servidor se realiza desde javascript.

La paginación la controla el servidor, ya que nos va proporcionando *trozos* de la consulta según vayamos requiriendo

Lo primero que vamos a hacer es instalar un componente de tailwind para el estilo de los botones de navegación

{{< highlight javascript "linenos=table,anclorlinenos=true, hl_lines=6" >}}
const defaultTheme = require('tailwindcss/defaultTheme');

/** @type {import('tailwindcss').Config} */
module.exports = {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
    ],
{{< / highlight >}}

Debemos instalar el componente de paginación de tailwind para **vue**
{{< highlight bash "linenos=table,anclorlinenos=true, hl_lines=1" >}}
    npm install laravel-vue-pagination
{{< / highlight >}}

Posteriormente, hay que cargarla en el componente de **listado_tabla.vue**
{{< highlight javascript "linenos=table,anclorlinenos=true, hl_lines=3 7-9" >}}
<script>
import axios from 'axios';
import {TailwindPagination} from 'laravel-vue-pagination';

export default {
    name: "tabla",
    components: {
        TailwindPagination,
    },
// resto de componente

{{< / highlight >}}
Y agregamos el componente al final de la tabla. Establemcemos el método getResults para gestionar los eventos de los botones que aparecen
{{< highlight html "linenos=table,anclorlinenos=true, hl_lines=2-9" >}}
<!--elementos table--> 
</table>
   <hr>
        <span class="text-blue-700 text-4xl">
        <TailwindPagination
            :data="filas"
            @pagination-change-page="getResults"
        />
        </span>

        <hr>
{{< / highlight >}}
   <hr>
        <span class="text-blue-700 text-4xl">
        <TailwindPagination
            :data="filas"
            @pagination-change-page="getResults"
        />
        </span>

        <hr>

Y ahora hay que interactuar con el servidor. Empecemos por el **index** del controlador. Lo único que cambia es que ahora entregamos 10 filas en lugar de todas

{{< highlight javascript "linenos=table,anclorlinenos=true, hl_lines=3" >}}
  public function index()
    {
        $alumnos = Alumno::paginate(10);
        //Una manera de obener los nombres de la columna
        $campos = array_keys($alumnos[0]->getAttributes());

        $tabla ="Alumnos";

        return view("alumnos.listado", ['filas'=> $alumnos,
                                             'campos'=>$campos,
                                             'tabla'=>$tabla]);
    }
{{< / highlight >}}

A la hora de recorrer las filas, ahora el método **paginate** no retorna una colección de modelos, 
sino un objeto paginator (LengthAwarePaginator), que al serializarlo, el comonente vue recibe en el elemnto data los datos, por lo que hay que recorrer el elemento data de filas
{{< highlight javascript "linenos=table,anclorlinenos=true, hl_lines=1" >}}
<tr v-for="fila in filas.data">
            <td v-for="valor in fila">
                {{ valor }}
            </td>
        </tr>
{{< / highlight >}}
Y ahora implmentamos el método del cliente 
{{< highlight javascript "linenos=table,anclorlinenos=true, hl_lines=3" >}}

  getResults(page = 1) {
            let url = window.location.href;
            let self = this;
            axios.get(
                url + "/paginate?page=" + page)
                .then(function (response) {
                    self.filas = response.data;
                    console.log("Respuesta " + response.data);
                })
                .catch(function (error) {
                    console.error("ERROR"+error);
                });
        }
{{< / highlight >}}

Nos quedaría terminar el proceso, es decir, agregar la ruta **/paginate** en el fichero de rutas **web.php** e implementar el método correspondiente

{{%pageinfo%}}
Cuidado al añadir la ruta, si la ponemos después de resources, no funcionará.

Esto sucede porque la ruta asignada para los métodos del resource que tienen parámetros, concretamente la ruta EmpresaController@show

  GET|HEAD        empresas/paginate ........... EmpresaController@get_paginate
  GET|HEAD        empresas/{empresa} .. empresas.show › EmpresaController@show

no tiene restricciones, es decir, puede ser un número o una cadena de texto
Para solucionarlo tenemos dos opciones:
 1.- Establecer la ruta de paginate antes que la de resources
 2.- Establecer un patrón para {empresa}, especificando que tiene que ser un número
{{%/pageinfo%}}

{{< highlight php "linenos=table,anclorlinenos=true, hl_lines=3" >}}
    Route::get("alumnos/paginate",[ \App\Http\Controllers\AlumnoController::class,"get_paginate"] );
{{< / highlight >}}
 Y en el fichero del controlador agretamos el método **get_paginate**
{{< highlight javascript "linenos=table,anclorlinenos=true, hl_lines=2-5" >}}
 public function get_paginate(){
        $empleados=Empleado::paginate(10);
        return response($empleados);
    }
{{< / highlight >}}
