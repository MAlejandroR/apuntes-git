---
title: "Métodos"
date: 2023-04-08T18:21:47+02:00
draft: false
weight: 50
---

## Métodos 

Para crear métodos vamos a agregar en el componente  el método, que será, en este caso asociaodo a un evento de un elemento **html**
Realizaremos dos métodos: **ordenar** y **filtrar**.

### Ordenar

Primero, mediante la directiva **v-on** o con el modo abreviado  **@** asociamos el evento a un método. Para ello envolvemos el nombre del campo en un botón
LA idea es que ordene por el campo que seleccionemos, por lo que deberemos de pasar al método el nombre del campo por el que queremos ordenar
{{< highlight  html "linenos=table,anclorlinenos=true, hl_lines=8 10" >}}
<template>
    <table>
        <caption>
              {{ tabla }}
        </caption>
        <tr>
            <th v-for="campo in campos">
                <button @click="ordena(campo)">
                    {{ campo }}
                </button>
            </th>
        </tr>
<!-- Resto html ...-->
{{< / highlight >}}

Ahora vamos a implmentar la parte de javascript


{{< highlight javascript "linenos=table,anclorlinenos=true, hl_lines=23-31" >}}
export default {
    name: "listado_tabla",
    props:['filas_serializadas',
           'campos_serializados',
        'tabla'] ,
    data() {
        return {
            filas: [],
            campos: [],
        }
    },
    created() {
        try {
            this.filas = JSON.parse(this.filas_serializadas);
            this.campos = JSON.parse(this.campos_serializados);
        } catch (e) {
            this.filas = [];
            this.campos = [];
        }
        
    },
    methods: {
        ordena(campo) {
            this.filas = this.filas.sort((a, b) => {
                if (a[campo] > b[campo])
                    retorno = 1;
                else
                    retorno = -1;
                return retorno;
            });
        },
}
</script>
{{< / highlight >}}

> Mejora:
> Realiza que la ordenacioń sea en orden ascendente y/o descendente
 
### filtrar
Para implementar esta funcionalidad deberemos de añadir una caja de texto en cada cabecera, donde podamos escribir un texto para filtrar
Además necesitamos que elemento del array de una fila es, para poder ordenar por ese elemento, por lo que observa como en la interacción tomamos también la posición.
Añadimos un elemento llamado size para establecer un ancho en cada caja de texto
{{< highlight html  "linenos=table,anclorlinenos=true, hl_lines=7-10" >}}
 <table>
        <caption>
            {{ tabla }}
        </caption>
        <tr>
            <th v-for="(campo,index) in campos">>
                <input @keyup="filtra(campo, valor[index])" 
                       type="text" 
                       :size=len_campo[index]
                       v-model='valor[index]'/>

                <botton @click="ordena(campo)">
                    {{ campo }}
                </botton>
            </th>
        </tr>
{{< / highlight >}}
El método se implementaría usando la función **filter** de **javascript**
{{< highlight  javascript "linenos=table,anclorlinenos=true, hl_lines=2-9" >}}
methods: {
    filtra(campo, valor) {
        this.filas = this.filas.filter((fila) => {
                            var texto = new String(fila[campo]);
                            if (texto.indexOf(valor) > -1)
                                return fila
                            }
                    );
        },
{{< / highlight >}}
### editar
Ahora querremos implmentar el método de editar. 
Lo único que hay que tener en cuenta, es que no estamos en laravel y no podemos usar los helper de laravel
Para realizar una llamada a una url desde javascript, usamos la propiedad **window.location.href** como se indica en la función
{{< highlight javascript "linenos=table,anclorlinenos=true, hl_lines=1-4" >}}
editar(id) {
    var url = window.location.href;
    window.location.href = url + '/' + id + "/edit";
},
{{< / highlight >}}

### borrar
Al igual que en el caso anterior, vamos a realizar una llamada desde javascript.
En este caso, vamos a realizar una llamada ajax, ya que solo queremos que se actualice el listado eliminando una fila.
Vamos a utilziar la librería **[axios](https://axios-http.com/es/)**
{{< highlight javascript "linenos=table,anclorlinenos=true, hl_lines=" >}}
borrar(id) {
    var url = window.location.href;
    var self = this;
    axios.delete(url + "/" + id)
        .then(function (response) {
            self.filas = response.data;
    });
{{< / highlight >}}

Ahora tendríamos que modificar el servidor el método delete del controlador, para que no me retorne un recurso, una página web, sino solo datos que es lo que el cliente espera recibir, por lo que el objeto response que retorna laravel, en este caso será un array de empleados en formato json.
{{< highlight php "linenos=table,anclorlinenos=true, hl_lines=1-8" >}}
public function destroy(Empleado $empleado)
{
$empleado->delete();
    $empleados=Empleado::all();
    return response($empleados);
}
{{< / highlight >}}