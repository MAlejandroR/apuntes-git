---
title: "Crea Contenedores"
linkTitle: "Contenedores"
weight: 20

icon: fa-solid fa-box-open
draft: false    
---

## __Crear y usar contenedores__

* Comandos a usar

> ```shell
> docker create
> docker start
> docker exec
> docker run 
> docker run --name
> docker run --name xxx --hostname xxx -p xxxx:xx v xx:xxx nombre_imagen
> ```

## __Crea, lista y borra contenedores__

* Comandos a usar

> ```shell
> docker create
> docker start
> docker exec 
> > docker ps -a
> docker rm nombre_contenedor
> docker rm (docker ps -a- q)
> ```
_Si estás en linux o en mac_

```bash
 docker rm $(docker ps -a -q)
 ```

#### __1. Crea 5 contenedor a partir de la imagen {{<color color="text-success">}}ubuntu:latest{{</color>}} sin especificar nombre__

{{<form  solucion="docker create ubuntu:latest docker create ubuntu:latest docker create ubuntu:latest docker create ubuntu:latest docker create ubuntu:latest">}}
{{</form>}}

#### __2. Verifica que los has creado__

{{<form  solucion="docker ps -a">}}
{{</form>}}

{{< alert title="Revisa con cuidado" color="warning" >}}
#### :mag: Reflexiona
* Observa que te tienen que salir en estado __created__
> Has de intentar enteder qué implica este estado y ver que en este contenedor __no puedo ejecutar__ nada hasta que no
> esté en estado __Up__
* Observa igualmente el nombre que el sistema le a asignado al contenedor
  {{< /alert >}}

#### __3. Verifica que los has creado__

{{<form  solucion="docker ps -a">}}
{{</form>}}
{{< alert title="Revisa con cuidado" color="warning" >}}

###### :mag: Reflexiona

* Observa que si solo escribes __docker ps__ no sale nada
* Esto es porque docker ps solo muestar los contenedores que están en estado __Up__
  {{</alert>}}
#### __4. Borra todos los contenedores y verificalo__

{{<form  solucion="docker rm (docker ps -a -q) docker ps -a">}}
{{</form>}}

 ___

#### __5. Crea un contenedor llamado {{<color color="text-success">}}web{{</color>}} a partir de la imagen {{<color color="text-success">}}ubuntu:latest{{</color>}}__

{{< alert title="parámetros" color="warning" >}}

#### :woman_detective: revisa los parámetros

* Puedes ver los parámetros de un comando con __docker help comando__
* seguimos usando el comando __create__ para crear contenedores
  {{< /alert>}}


> {{<form  solucion="docker create --name web ubuntu:latest">}}
 {{</form>}}

#### __6. Arranca el contenedor__
> {{<form  solucion="docker start web">}}
 {{</form>}}

#### __7. Observa su estado__
> {{<form  solucion="docker ps -a">}}
 {{</form>}}
> {{< alert title="parámetros" color="warning" >}}

#### :mag: estados del contenedor

* Entender los estados del contenedor al principio cuesta
* Un contenedor, cuando lo arrancamos ejectua el servicio o programa que tenga asignado __estado Up__ y luego se detiene
  __estado Exited__
* Al revisar este ejercicio verás que el contenedor pasa directamente a estado Exited, y es porque el contenedor al
  estar creado a partir de la imagen ubuntu:latest sí que tiene asociado un commando (revisa la columna __COMMAND__)
* Pero como no tiene ningún terminal asociado para interactuar con él, no hace nada y muere
  {{< /alert >}}
#### __8. Borra todos los contenedores__
> {{<form  solucion="docker rm (docker ps -a -q)">}}
  {{</form>}}

#### __9. Crea un contenedor llamado web que permita ejecutar comandos en un terminal de forma interactiva a partir de la imagen ubuntu_latest__

{{< alert title="Usa Help" color="warning" >}}

#### :woman_detective: revisa los parámetros

* Puedes ver los parámetros de un comando con __docker help comando__
* En este caso __docker help create__
* En este caso lo podemos asociar con el comando __-t__ para terminal y __-i__ para ineteractive
  {{< /alert >}}
> {{<form  solucion="docker create -t -i --name web ubuntu:latest">}}
 {{</form>}}

#### __10. Arranca el contenedor__

{{< alert title="Parámetros" color="warning" >}}

#### :woman_detective: revisa los parámetros

* Para arrancar __docker start__
  {{< /alert >}}

> {{<form  solucion="docker start web">}}
 {{</form>}}

####  __11. Ejecuta de forma interactiva (-i) en un terminal (-t) un comado bash__
{{< alert title="Parámetros" color="warning" >}}
#### :woman_detective: revisa los parámetros
* Revisa el comando __docker exec__
* Los parámetros -i y -t
* el orden es primero especificar el contenedor y luego el comando
* bash es un programa que sirve para interpretar comandos, como cuando abrimos un shell en windows
  {{< /alert >}}

> {{<form  solucion="docker exec -i -t web bash ">}}
 {{</form>}}

#### __12. Para el contenedor__

> {{<form  solucion="docker stop web">}}
 {{</form>}}

#### __13. Revisa su estado__

> {{<form  solucion="docker ps -a">}}
 {{</form>}}
#### __14. Borra todos los contenedores__
> {{<form  solucion="docker rm (docker ps -a -q) ">}}
 {{</form>}}
 
#### __15. Crea un contenedor llamado {{<color color="text-success">}}web{{</color>}} que se quede arrancado a partir de la imagen {{<color color="text-success">}}ubuntu_latest{{</color>}}__ 
{{< alert title="Los estados del contenedor" color="warning" >}}
#### :male_detective: 
* Si queremos dejar el contenedor en estado __Up__ debemos usar el comando __docker run__ 
* No es necesario, pero mejor especifica el comando al final (bash)
* Aunque el orden de los parámetros no es importante, la solución tiene uno concreto, pero eso podría cambiar 
{{< /alert >}}
> {{<form  solucion="docker run --name web -t -i ubuntu:latest bash">}}
{{</form>}}
#### __16. Instala apache2 y  php en el contendor web__ 
{{< alert title="instando:  apt update" color="warning" >}}
#### :books:
* Una vez dentro lo primero que hay que hacer es __apt update__
* se pueden instalar todos los paquetes a la vez
* con __-y__ no nos preguntará si queremos instalarlo
* php implica dos paquetes __php__, el intérprete, y el módulo que viene con apache para que apache sepa que un determinado recurso que tiene extensión php, tiene que llamar al intérprete para que lo ejectue, este es el paquete __libapache2-mod-php__
  {{< /alert >}}
> {{<form  solucion="apt update apt install -y apache2 php libapache2-mod-php">}}
 {{</form>}}
#### __17. Arranca el servicio de apache__
{{<form  solucion="service apache start">}}
{{</form>}}
{{< alert title="parando y arrancando" color="warning" >}}
:arrow_forward: :stop_sign:
*Prueba a pararlo (__stop__), a ver su estado (__status__)  y volverlo a arrancar (__start__|__restart__)
{{< /alert >}}
#### __18. Borra el contendor web__
{{< alert title="Warning" color="warning" >}}
:bulb:
 Antes de elimniar el contenedor tiene que estar parado
{{< /alert >}}
{{<form  solucion="docker stop web docker rm web">}}
{{</form>}}
#### __19. Crea igual que antes el contenedor web, pero mapeando el puerto {{<color color="text-success">}}8000:80{{</color>}}__
{{< alert title="Recuerda" color="primary" >}}
###### :warning: Muy importante
  Es muy importante que entiendas el concepto
{{< /alert >}}
> {{<form  solucion="docker run --name web -t -i -p 8000:80 ubuntu:latest bash">}}
{{</form>}}
#### __20. Instala apache2 y  php en el contendor web__ 
> {{<form  solucion="apt update apt install -y apache2 php libapache2-mod-php">}}
> {{</form>}}