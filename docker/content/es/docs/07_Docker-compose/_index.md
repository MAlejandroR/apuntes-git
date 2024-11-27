---
title: "Docker compose"
linkTitle: "docker compose"
weight: 60
icon: "fas fa-file-code"
draft: false    
---
 
Si quiero desarrollar una aplicación web,  puedo necesitar tener en el sistema:
>   * Un servidor web: p.e  apache
>   * Un intérprete de código: p.e  php
>   * Un servidor de bases de datos: p.e mysql
>     * Una herramienta para gestionar: p.e phpmyadmin


{{< imgproc ejemplo1 Fill "400x450" >}}

{{< /imgproc >}}

Ante esta situación qué hacemos

{{< imgproc pensando Fill "400x450" >}}
* Podría tener un contenedor con todos los servicios.
 <br />
* Pero vaya lío tener todo en un contenedor
 <br />
* ¿Podría tener un contenedor con cada servicio?
{{< /imgproc >}}

{{< color >}} Qué me va a permtir docker compose {{< /color >}}
> * Docker compose me va a permitir especificar en un fichero los servicios que necesito
> * Va a crear un contenedor por cada servicio
> * Va a crear una red interna para que dichos servicios se vean entre sí
> * Me va a permitir, mediante comandos poder gestionar todos los servicios de manera individual
> * Todo centralizado en un comando de docker : compose.
> * Evitamos tener que tener varios ficheros Dockerfile y gestionarlos uno por uno para que se ejecuten .
> * La ejecución de docker-compose va a generar contenedores con servicios.

### Fichero de configuración
* Es un fichero llamado {{< color >}} docker-compose.yaml  o (docker-compose.yml) {{< /color >}}
  * {{< color >}} yaml {{< /color >}} o {{< color >}} yml {{< /color >}} es un tipo de {{< color >}} fichero de declarativo {{< /color >}}, cuya  configuracioń y sintaxis es muy sencilla.
  yaml viene de YAML Ain’t Markdown Language (Yaml no es un lenguaje de marcado) especificando que no es como XML o HTML:
  > *{{< color >}} Tiene en cuenta la indentación creando bloques {{< /color >}}.
  > *Asigno valores a variables utilizando : (dos puntos), debiendo de haber una separación entre los dos puntos y el valor
  >* Para crear listas usa los guiones
  
  Es un fichero muy fácil de entender
  
{{< color >}} Creando el fichero  {{< /color >}}
1.- Vamos a ver la construcción del fichero {{< color >}} docker-compose.yaml {{< /color >}}.    
2.- Posteriormente veremos cómo {{< color >}} ejecutar el fichero {{< /color >}} y construir nuestro {{< color >}} entorno de desarrollo {{< /color >}}.
### Sintaxis del fichero
El fichero docker-compose va a tener opciones de configuración que podemos jerarquizar

Es un fichero de configuración con formato yaml
{{< imgproc config1 Fill "400x450" >}}

{{< /imgproc >}}
{{< imgproc config2 Fill "400x450" >}}

{{< /imgproc >}}
Sintaxis YAML (https://es.wikipedia.org/wiki/YAML):
La indentación establece la agrupación.
Si queremos establecer una lista, usamos guiones
Hay que dejar un espacio entre los dos puntos y el valor.


# Tema 3: Docker Compose

{{< color >}}Docker Compose{{< /color >}} es una herramienta que permite definir y ejecutar aplicaciones multicontenedor con un archivo de configuración llamado `docker-compose.yml`.

{{% line %}}

## Introducción a Docker Compose

{{<definicion title="Docker Compose" icon="docker">}}
Docker Compose es una herramienta que nos permite gestionar sistemas dockerizados, facilitando la configuración y ejecución de aplicaciones multicontenedor de forma sencilla y ordenada, utilizando un único archivo YAML.
{{</definicion>}}

---

## Beneficios de Docker Compose

{{< alert title="Ventajas de Docker Compose" color="green" >}}
- Facilita la creación y gestión de entornos complejos.
- Centraliza la configuración de varios contenedores en un único archivo.
- Automatiza la creación de redes internas para la comunicación entre servicios.
- Simplifica la administración de contenedores relacionados.
  {{< /alert >}}

{{% line %}}

## ¿Cómo funciona Docker Compose?

Docker Compose utiliza un archivo `docker-compose.yml` para definir servicios, redes y volúmenes necesarios para una aplicación.

{{< color >}} Estructura básica de un archivo docker-compose.yml {{< /color >}}

```dockerfile
services:
    web:
        image: nginx:latest
        ports:
            - "8080:80"
    db:
        image: mysql:5.7
        environment:
            - MYSQL_ROOT_PASSWORD: example
            - MYSQL_DATABASE: test
```

---

## Sintaxis del archivo YAML

El archivo `docker-compose.yml` utiliza la sintaxis YAML, la cual es declarativa y fácil de entender.

{{< alert title="Características de YAML" color="blue" >}}
- La indentación establece la agrupación.
- Se usan dos puntos `:` para asignar valores a variables.
- Para crear listas, se emplean guiones `-`.
  {{< /alert >}}

Ejemplo de sintaxis básica en YAML:
{{< highlight dockerfile "linenos=table, hl_lines=1-5" >}}
services:
    web:
        image: nginx:latest
        ports:
            - "8080:80"
{{< /highlight >}}

---

## Opciones principales del archivo docker-compose.yml

1. **services**: Define los contenedores que forman parte de la aplicación.
2. **volumes**: Especifica volúmenes para persistir datos.
3. **networks**: Configura redes internas para los servicios.

{{% line %}}

## Ejemplo práctico: Servidor web y base de datos

Creamos una configuración para un servidor web con Nginx y una base de datos MySQL.

{{< highlight dockerfile "linenos=table, hl_lines=3 7" >}}
services:
web:
    image: php:8.3-apache
    ports:
        - "8080:80"
    
    db:
        image: mysql
        environment:
            - MYSQL_ROOT_PASSWORD: root
            - MYSQL_DATABASE: ejemplo
            - MYSQL_USER: usuario
            - MYSQL_PASSWORD: contraseña
{{< /highlight >}}

Ejecución:
1. Levantar los servicios:
   {{< highlight dockerfile "linenos=table" >}}
   docker compose up -d
   {{< /highlight >}}

2. Verificar contenedores activos:
   {{< highlight dockerfile "linenos=table" >}}
   docker compose ps
   {{< /highlight >}}

3. Detener los servicios:
   {{< highlight dockerfile "linenos=table" >}}
   docker compose down
   {{< /highlight >}}

---

## Referencias

{{<referencias title="Documentación oficial" subtitle="Docker Compose" icon-image="docker-icon.png">}}
- [Docker Compose Overview](https://docs.docker.com/compose/)
- [Compose File Reference](https://docs.docker.com/compose/compose-file/)
  {{</referencias>}}
