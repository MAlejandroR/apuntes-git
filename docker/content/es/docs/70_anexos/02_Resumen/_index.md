+++
title = 'Comandos docker'
date = 2024-10-15T07:04:49+02:00
draft = false
icon = "fa fa-docker"
weight = 20
description = "Repaso docker"
+++

{{< objetivos  >}}
Un listado básico con concpetos vistos
{{< /objetivos >}}



### Conceptos básicos de Docker

| Concepto                   | Descripción                                                                                                      |
|-----------------------------|------------------------------------------------------------------------------------------------------------------|
| **Docker**                  | Plataforma para crear, ejecutar y administrar contenedores. Permite virtualización ligera y portable.            |
| **Formas de uso**           | A través de línea de comandos (CLI) o mediante interfaces gráficas como *Docker Desktop* o *Portainer*.           |
| **Virtualización**          | Entorno aislado con su propio sistema de ficheros, red e IP.                                                     |
| **Diferencia con MV**       | Un contenedor no incluye un sistema operativo completo ni reserva hardware. Comparte el kernel del host, por lo que es más ligero y eficiente. || **Elementos principales**   | - **Imágenes** (plantillas de solo lectura) <br> - **Contenedores** (ejecuciones de imágenes) <br> - **Docker Hub** (repositorio oficial de imágenes). |
| **Imagen**                  | Fichero base, inmutable, con el *entorno de usuario* (librerías y dependencias) de un sistema operativo y de la aplicación. El kernel lo aporta siempre el host. |
| **Contenedor**              | Instancia en ejecución de una imagen. Se crea con una capa de lectura/escritura. Siempre ejecuta una aplicación principal; si esta finaliza, el contenedor se detiene. |
| **Estados de un contenedor**| Los más comunes son **Up** (ejecutándose) y **Exited** (detenido). Un contenedor solo presta servicio si está en estado *Up*. |
| **`docker run`**            | Comando que crea y lanza un contenedor a partir de una imagen. <br> - Si la imagen no existe localmente, la descarga (*docker pull*). <br> - Internamente combina: <br> &nbsp;&nbsp;• **docker pull** (si la imagen no está) <br> &nbsp;&nbsp;• **docker create** (crea el contenedor) <br> &nbsp;&nbsp;• **docker start** (lo arranca) <br> &nbsp;&nbsp;• **docker exec** (ejecuta el comando indicado en el contenedor). |

**Ejemplo:**

{{< highlight bash tabla_alumnos "linenos=table, hl_lines=2 5-8" >}}
# Comando resumido con docker run
docker run --name web ubuntu:latest bash

# Equivalente a ejecutar paso a paso:
docker pull ubuntu:latest                # Descarga la imagen si no existe
docker create --name web ubuntu:latest   # Crea el contenedor
docker start web                         # Lo arranca
docker exec web bash                     # Ejecuta bash dentro del contenedor
{{< /highlight>}}   



