---
title: "Docker Prácticas"
linkTitle: "Comandos docer"
weight: 40
icon: fa-solid fa-terminal
draft: false    
---

### 1. Instalación de Docker en Windows

{{<definicion title="Paquetes necesarios para instalar Docker" sub_title="Para Windows" >}}
Docker no se instala directamente sobre Windows; requiere una capa de virtualización que le permita correr sobre Linux.
{{</definicion>}}

1. {{< color >}} Descargar Docker Desktop Installer {{< /color >}}: Descarga el archivo **Docker Desktop Installer.exe** y ejecútalo o usa la línea de comandos:

   {{< highlight bash "linenos=table, hl_lines=1" >}}
   Start-Process '.\Docker Desktop Installer.exe' install
   {{< /highlight >}}

2. {{< color >}} Selección de virtualización {{< /color >}}: Durante la instalación, elige entre **Hyper-V** y **WSL**.
   - Usa **Hyper-V** si planeas dockerizar sistemas Windows.
   - Para otros casos, **WSL** es más eficiente.

   [Documentación oficial de Docker para Windows](https://docs.docker.com/docker-for-windows/install/)

---

### 2. Arrancar el Servicio

{{< alert title="Nota" >}}
Después de instalar, Docker no arranca automáticamente en Windows. Debes iniciar el servicio manualmente.
{{< /alert >}}

1. {{< color >}} Activar Docker Desktop {{< /color >}}:
   - Busca **Docker Desktop** en el menú y ejecútalo.
   - La primera vez que lo abras, se te notificará sobre las licencias de uso gratuito para pequeñas empresas.

---

### 3. Crear contenedores de Windows

1. {{< color >}} Configuración para contenedores de Windows {{< /color >}}:
   - Para crear contenedores de Windows, necesitas habilitar esta opción en Docker Desktop.
   - Ve al menú contextual de Docker y selecciona **Switch to Windows containers**.

   > En este curso, no configuraremos contenedores de Windows.

---

### 4. Interfaz Gráfica en Windows

1. {{< color >}} Uso de la interfaz gráfica {{< /color >}}:
   Docker Desktop en Windows incluye una interfaz gráfica que facilita la gestión de contenedores, imágenes y configuraciones.

---

### 5. Configuración de Docker Desktop

1. {{< color >}} Personalización de Docker Desktop {{< /color >}}:
   - Docker Desktop permite ajustes avanzados para gestionar el rendimiento y recursos del sistema.
   - Ajusta las configuraciones según tus necesidades desde la sección **Settings**.

---

### 6. Obteniendo una Imagen

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

### 7. Creando un Contenedor

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

### 8. Ejecutando y Administrando Contenedores

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

### 9. Estados del Contenedor

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

### 10. Ejecución de Comandos en el Contenedor

1. {{< color >}} Ejecutar comandos con `docker exec` {{< /color >}}:
   - Usa `docker exec` para ejecutar comandos en un contenedor que ya esté en ejecución.

   {{< highlight bash "linenos=table, hl_lines=1" >}}
   docker exec -ti web bash
   {{< /highlight >}}

---

### 11. Forward de Puertos

1. {{< color >}} Redireccionamiento de puertos entre anfitrión y contenedor {{< /color >}}:
   - Para acceder al servidor web desde la red, configura un puerto en el anfitrión que redirija al puerto 80 del contenedor.

   {{< highlight bash "linenos=table, hl_lines=1-2" >}}
   docker run -ti -p 8080:80 --name web ubuntu:latest
   {{< /highlight >}}

---

### 12. Compartiendo Carpetas

{{<definicion title="Mapeo de Directorios" sub_title="Compartir carpetas entre el anfitrión y el contenedor" >}}
Puedes mapear una carpeta local en el directorio de trabajo del contenedor para compartir archivos.
{{</definicion>}}

1. {{< color >}} Crear un volumen compartido {{< /color >}}:
   {{< highlight bash "linenos=table, hl_lines=1" >}}
   docker run -ti -p 8080:80 --name web -v /home/usuario/docker:/var/www/html ubuntu:latest
   {{< /highlight >}}

> Si la carpeta no existe, Docker la crea automáticamente.

---

### 13. Crear una Imagen desde un Contenedor

{{<definicion title="Crear imagen desde contenedor" sub_title="Usar `docker commit` para crear una imagen" >}}
Para conservar el estado de un contenedor y replicarlo, crea una imagen con `docker commit`.
{{</definicion>}}

1. {{< color >}} Crear imagen {{< /color >}}:
   {{< highlight bash "linenos=table, hl_lines=1" >}}
   docker commit container_name nombre_imagen:tag
   {{< /highlight >}}

---

### 14. Comandos para Manejar Volúmenes

1. {{< color >}} Crear y administrar volúmenes {{< /color >}}:
   - Comandos útiles para gestionar volúmenes en Docker:

   {{< highlight bash "linenos=table, hl_lines=1-4" >}}
   docker volume create [nombre]
   docker volume ls
   docker volume inspect nombre
   docker volume rm nombre
   {{< /highlight >}}

> Los volúmenes permiten persistir datos y compartirlos entre contenedores o con el sistema anfitrión.
