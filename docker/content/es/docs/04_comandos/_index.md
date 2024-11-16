---
title: "Docker Práctico en línea de comandos "
linkTitle: "Comandos docker"
weight: 40
icon: fa-solid fa-terminal
draft: false    
---

### 1. Obteniendo una Imagen

{{<definicion title="Obtención de Imágenes" sub_title="Cómo descargar y gestionar imágenes en Docker" >}}
Las imágenes en Docker son las bases para crear contenedores. Puedes obtener diferentes versiones de una imagen usando etiquetas.
{{</definicion>}}

1. {{< color >}} Descarga una imagen {{< /color >}}:
   {{< highlight bash "linenos=table, hl_lines=1" >}}
   docker pull ubuntu:latest
   {{< /highlight >}}

2. {{< color >}} Ver imágenes disponibles {{< /color >}}:
   {{< highlight bash "linenos=table, hl_lines=1" >}}
   docker images
   {{< /highlight >}}

3. {{< color >}} Consultar ayuda {{< /color >}}:
   {{< highlight bash "linenos=table, hl_lines=1" >}}
   docker help images
   {{< /highlight >}}

---

### 2. Creando un Contenedor

{{< alert title="Información" >}}
Un contenedor es una instancia ejecutable de una imagen, que contiene todo el entorno necesario para correr aplicaciones de forma aislada.
{{< /alert >}}

1. {{< color >}} Crear contenedor {{< /color >}}:
   - Usamos el comando `docker create` para crear contenedores sin ejecutarlos inmediatamente.

   {{< highlight bash "linenos=table, hl_lines=1-3" >}}
   docker create --name ls ubuntu:latest ls
   docker create -i -t --name bash ubuntu:latest bash
   docker create --name update ubuntu:latest apt-get update
   {{< /highlight >}}

---

### 3. Ejecutando y Administrando Contenedores

1. {{< color >}} Ver contenedores creados {{< /color >}}:
   {{< highlight bash "linenos=table, hl_lines=1" >}}
   docker ps -a
   {{< /highlight >}}

2. {{< color >}} Ejecutar contenedores creados {{< /color >}}:
   - Para ejecutar un contenedor creado, usa el comando `docker start` con opciones para ver su salida en consola.

   {{< highlight bash "linenos=table, hl_lines=1-3" >}}
   docker start -a ls
   docker start -i bash
   docker start -a update
   {{< /highlight >}}

---

### 4. Estados del Contenedor

{{<definicion title="Estados del Contenedor" sub_title="Running, Exited, y Stopped" >}}
Un contenedor en Docker puede estar en diferentes estados:
- **Running**: El contenedor está activo y operativo.
- **Exited** y **Stopped**: Similares, aunque `exited` indica una detención inesperada mientras `stopped` es una parada controlada.
  {{</definicion>}}

Para ver los estados de cada contenedor:
{{< highlight bash "linenos=table, hl_lines=1" >}}
docker ps -a
{{< /highlight >}}

---

### 5. Ejecución de Comandos en el Contenedor

1. {{< color >}} Ejecutar comandos con `docker exec` {{< /color >}}:
   - Usa `docker exec` para ejecutar comandos en un contenedor que ya esté en ejecución.

   {{< highlight bash "linenos=table, hl_lines=1" >}}
   docker exec -ti web bash
   {{< /highlight >}}

---

### 6. Forward de Puertos

1. {{< color >}} Redireccionamiento de puertos entre anfitrión y contenedor {{< /color >}}:
   - Para acceder al servidor web desde la red, configura un puerto en el anfitrión que redirija al puerto 80 del contenedor.

   {{< highlight bash "linenos=table, hl_lines=1-2" >}}
   docker run -ti -p 8080:80 --name web ubuntu:latest
   {{< /highlight >}}

---

### 7. Compartiendo Carpetas

{{<definicion title="Mapeo de Directorios" sub_title="Compartir carpetas entre el anfitrión y el contenedor" >}}
Puedes mapear una carpeta local en el directorio de trabajo del contenedor para compartir archivos.
{{</definicion>}}

1. {{< color >}} Crear un volumen compartido {{< /color >}}:
   {{< highlight bash "linenos=table, hl_lines=1" >}}
   docker run -ti -p 8080:80 --name web -v /home/usuario/docker:/var/www/html ubuntu:latest
   {{< /highlight >}}

> Si la carpeta no existe, Docker la crea automáticamente.

---
### 8. Crear una Imagen desde un Contenedor

{{<definicion title="Crear imagen desde contenedor" sub_title="Usar `docker commit` para crear una imagen" >}}
Para conservar el estado de un contenedor y replicarlo, crea una imagen con `docker commit`.
{{</definicion>}}

1. {{< color >}} Crear imagen {{< /color >}}:
   {{< highlight bash "linenos=table, hl_lines=1" >}}
   docker commit container_name nombre_imagen:tag
   {{< /highlight >}}

---
### 9. Comandos para Manejar Volúmenes

1. {{< color >}} Crear y administrar volúmenes {{< /color >}}:
   - Comandos útiles para gestionar volúmenes en Docker:

   {{< highlight bash "linenos=table, hl_lines=1-4" >}}
   docker volume create [nombre]
   docker volume ls
   docker volume inspect nombre
   docker volume rm nombre
   {{< /highlight >}}

> Los volúmenes permiten persistir datos y compartirlos entre contenedores o con el sistema anfitrión.

### 9. Otros Comandos Importantes en Docker

1. {{< color >}} Comandos útiles en Docker {{< /color >}}: Existen varios comandos para gestionar contenedores e imágenes. Aquí algunos de los más importantes:

   {{< highlight bash "linenos=table, hl_lines=1-10" >}}
   docker inspect
   docker pause
   docker unpause
   docker rm
   docker stop
   docker rmi
   docker login
   docker push
   docker pull
   docker import
   docker export
   {{< /highlight >}}

   Para obtener ayuda detallada sobre cada comando:
   {{< highlight bash "linenos=table, hl_lines=1" >}}
   docker help
   {{< /highlight >}}

---
### 10. Inspección de Contenedores

{{<definicion title="Comando inspect" sub_title="Obteniendo información detallada" >}}
El comando `docker inspect` proporciona información detallada del contenedor, como directorios mapeados y puertos abiertos.
{{</definicion>}}

1. {{< color >}} Inspeccionar un contenedor {{< /color >}}:

   {{< highlight bash "linenos=table, hl_lines=1" >}}
   docker inspect [opciones] nombre_contenedor
   {{< /highlight >}}

   > **Nota**: Con la opción `-s`, obtienes información adicional sobre el tamaño de los archivos.

---
### 11. Pausar y Reiniciar un Contenedor

1. {{< color >}} Pausar y reanudar {{< /color >}}: Los comandos `docker pause` y `docker unpause` congelan y reinician un contenedor en un estado específico.

   {{< highlight bash "linenos=table, hl_lines=1-2" >}}
   docker pause
   docker unpause
   {{< /highlight >}}

   **Práctica**: Arranca un contenedor, abre un terminal y pausa el contenedor. Observa cómo afecta el terminal y reanúdalo.

---
### 12. Borrar un Contenedor

{{< alert title="Información" >}}
Para borrar un contenedor, debe estar detenido. Usa `docker stop` para detenerlo primero.
{{< /alert >}}

1. {{< color >}} Detener y borrar contenedores {{< /color >}}:
   - `docker stop` tiene una opción `-t` para especificar el tiempo de espera antes de detener el contenedor.

   {{< highlight bash "linenos=table, hl_lines=1-2" >}}
   docker stop [opciones]
   docker rm [opciones]
   {{< /highlight >}}

   **Nota**: `pause` y `stop` no son lo mismo. `pause` detiene momentáneamente el contenedor sin interrumpir el proceso, mientras que `stop` finaliza la ejecución.

---
### 13. Borrar Todos los Contenedores

1. {{< color >}} Comando para borrar múltiples contenedores {{< /color >}}:

   {{< highlight bash "linenos=table, hl_lines=1-2" >}}
   docker stop $(docker ps -a -q)
   docker rm $(docker ps -a -q)
   {{< /highlight >}}

   > En PowerShell, utiliza paréntesis en lugar de `$()`.

---
### 14. Ver Imágenes y Borrarlas

{{<definicion title="Gestión de Imágenes" sub_title="Visualización y eliminación de imágenes" >}}
Para borrar una imagen, no debe tener contenedores asociados, independientemente de su estado.
{{</definicion>}}

1. {{< color >}} Comandos para imágenes {{< /color >}}:

   {{< highlight bash "linenos=table, hl_lines=1-2" >}}
   docker images
   docker rmi nombre_imagen
   {{< /highlight >}}

---

### 15. Exportar e Importar Imágenes

{{<definicion title="Exportación e Importación de Imágenes" sub_title="Uso de archivos tar para migración de imágenes" >}}
Los comandos `docker export` y `docker import` permiten guardar una imagen en un archivo `.tar` y restaurarla posteriormente.
{{</definicion>}}

1. {{< color >}} Exportar un contenedor a un archivo tar {{< /color >}}:

   {{< highlight bash "linenos=table, hl_lines=1" >}}
   docker export -o web.tar web
   {{< /highlight >}}

2. {{< color >}} Importar una imagen desde un archivo {{< /color >}}:

   {{< highlight bash "linenos=table, hl_lines=1" >}}
   docker import web.tar
   {{< /highlight >}}

   **Ejercicio**: Exporta el contenedor `web` a un archivo tar, revisa su tamaño, y crea una imagen `web:v2` a partir del archivo.

---

### 16. Trabajando con Docker Hub

{{<definicion title="Docker Hub" sub_title="Repositorio de imágenes" >}}
Docker Hub permite almacenar, compartir y descargar imágenes de contenedores.
{{</definicion>}}

1. {{< color >}} Comandos esenciales para Docker Hub {{< /color >}}:

   {{< highlight bash "linenos=table, hl_lines=1-4" >}}
   docker login
   docker search
   docker pull nombre_imagen
   docker push nombre_imagen
   {{< /highlight >}}

---

### 17. Creando una Cuenta y Usando Docker Hub

1. {{< color >}} Crear una cuenta en Docker Hub {{< /color >}}:
   - Puedes descargar imágenes sin cuenta usando `docker pull` o `docker run`.
   - Inicia sesión con `docker login` para subir tus propias imágenes.

2. {{< color >}} Subir imágenes al repositorio {{< /color >}}:
   - Usa `docker push` para subir una imagen. **Recuerda**: el nombre de usuario debe ser parte del nombre de la imagen.

---


### 18. Estadísticas de Contenedores

{{<definicion title="docker stats" sub_title="Monitorización de uso de recursos" >}}
El comando `docker stats` muestra estadísticas en tiempo real del uso de recursos por los contenedores.
{{</definicion>}}

1. {{< color >}} Ver estadísticas de todos los contenedores activos {{< /color >}}:
   {{< highlight bash "linenos=table, hl_lines=1" >}}
   docker stats
   {{< /highlight >}}

---

### 19. Espacio en Disco

{{<definicion title="docker system df" sub_title="Uso de disco en Docker" >}}
El comando `docker system df` proporciona información sobre el uso de disco por imágenes, contenedores y volúmenes.
{{</definicion>}}

1. {{< color >}} Revisar el uso de disco por Docker {{< /color >}}:
   {{< highlight bash "linenos=table, hl_lines=1" >}}
   docker system df
   {{< /highlight >}}

---

### 20. Logs de Contenedores

{{<definicion title="docker logs" sub_title="Acceso a registros de contenedores" >}}
Con `docker logs`, puedes revisar los registros de un contenedor para solucionar problemas o revisar su estado.
{{</definicion>}}

1. {{< color >}} Ver logs de un contenedor específico {{< /color >}}:
   {{< highlight bash "linenos=table, hl_lines=1" >}}
   docker logs container_name
   {{< /highlight >}}

> **Nota**: Usa `--tail` para ver solo las últimas líneas.

---

### 21. Gestión de Redes

{{<definicion title="docker network" sub_title="Administrar redes en Docker" >}}
Docker permite gestionar redes personalizadas para conectar contenedores.
{{</definicion>}}

1. {{< color >}} Listar redes disponibles {{< /color >}}:
   {{< highlight bash "linenos=table, hl_lines=1" >}}
   docker network ls
   {{< /highlight >}}

2. {{< color >}} Crear una red personalizada {{< /color >}}:
   {{< highlight bash "linenos=table, hl_lines=1" >}}
   docker network create my_custom_network
   {{< /highlight >}}

---

### 22. Renombrar Contenedores

{{<definicion title="docker rename" sub_title="Cambiar el nombre de un contenedor" >}}
Usa `docker rename` para renombrar un contenedor existente.
{{</definicion>}}

1. {{< color >}} Renombrar un contenedor {{< /color >}}:
   {{< highlight bash "linenos=table, hl_lines=1" >}}
   docker rename old_name new_name
   {{< /highlight >}}

---

### 23. Limpieza de Recursos

{{<definicion title="docker system prune" sub_title="Liberar espacio eliminando recursos no utilizados" >}}
El comando `docker system prune` elimina contenedores, imágenes y volúmenes que no se estén utilizando.
{{</definicion>}}

1. {{< color >}} Ejecutar limpieza de recursos {{< /color >}}:
   {{< highlight bash "linenos=table, hl_lines=1" >}}
   docker system prune -f
   {{< /highlight >}}

> **Nota**: Añade la opción `--volumes` para eliminar también volúmenes.