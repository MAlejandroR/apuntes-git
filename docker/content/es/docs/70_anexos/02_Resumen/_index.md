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

### Estados de un contenedor según cómo se cree

| Comando                                               | Proceso principal (PID 1) | Estado tras `docker ps`        | ¿Puedo entrar después? | Explicación breve |
|-------------------------------------------------------|---------------------------|--------------------------------|-------------------------|-------------------|
| `docker run --name c1 ubuntu:latest`                  | `bash` (sin tty/stdin)    | `Exited` inmediato             | ❌ No                  | `bash` detecta que no hay terminal y termina. |
| `docker run -it --name c2 ubuntu:latest`              | `bash` (con tty/stdin)    | `Up` mientras dure la sesión   | ✅ Sí (ya estás dentro) | Sesión interactiva con `bash`. |
| `docker run -dit --name c3 ubuntu:latest`             | `bash` (detached, tty)    | `Up`                           | ✅ Con `docker exec`    | Contenedor sigue en background; puedes entrar con `exec`. |
| `docker run --name c4 ubuntu:latest sleep infinity`   | `sleep infinity`          | `Up`                           | ✅ Con `docker exec`    | Proceso nunca termina, mantiene el contenedor vivo. |
| `docker run --name c5 ubuntu:latest touch 1.txt`      | `touch 1.txt`             | `Exited` inmediato             | ❌ No                  | El comando se ejecuta y termina, contenedor muere. |

---

**Regla de oro**: un contenedor vive mientras viva su proceso principal.
- Usa `-it` si quieres trabajar directamente con un shell.
- Usa `-dit` si quieres dejarlo corriendo y conectarte más tarde con `docker exec`.
- Si el proceso termina → el contenedor pasa a `Exited`.  

### Opciones más comunes de `docker run`

| Opción               | Ejemplo                                      | Explicación breve |
|-----------------------|----------------------------------------------|-------------------|
| `--name`             | `docker run --name web ubuntu:latest`        | Asigna un nombre al contenedor (en lugar de ID aleatorio). |
| `-h` / `--hostname`  | `docker run -h servidor1 ubuntu:latest`      | Define el hostname interno del contenedor. |
| `-p`                 | `docker run -p 8080:80 httpd`                | Publica un puerto (host:contenedor). |
| `-v` (Linux → Linux) | `docker run -v /home/manuel/web:/var/www/html httpd` | Monta el directorio local en `/var/www/html` del contenedor (caso típico con Apache). |
| `-v` (Windows → Linux) | `docker run -v C:\Users\Manuel\web:/var/www/html httpd` | En Windows, rutas con `C:\...` se montan en `/var/www/html` del contenedor. |
| `-d`                 | `docker run -d httpd`                        | Ejecuta en segundo plano (detached). |
| `-it`                | `docker run -it ubuntu bash`                 | Interactivo con terminal (`stdin`+`tty`). |
| `--network`          | `docker run --network mi_red httpd`          | Conecta el contenedor a una red Docker específica. |
| `--rm`               | `docker run --rm ubuntu echo "hola"`         | El contenedor se elimina automáticamente al salir. |
| `--env` / `-e`       | `docker run -e MYSQL_ROOT_PASSWORD=1234 mysql` | Define variables de entorno. |
| `--restart`          | `docker run --restart=always httpd`          | Política de reinicio automático (ej: tras fallo o reinicio del host). |

---

**Notas prácticas sobre `-v`:**
- En **Linux**, se usan rutas absolutas (`/home/usuario/...`).
- En **Windows con Docker Desktop**, se usan rutas de la forma `C:\Users\...`.
- Para Apache, el mapeo típico es al directorio raíz `/var/www/html`.  


