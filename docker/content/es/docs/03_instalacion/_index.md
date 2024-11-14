---
title: "Instalación"
linkTitle: "Instalación"
weight: 30
icon: "fa fa-download"
draft: false
---

{{< objetivos  >}}
Instalar docker en ubuntu
Instalar docker en windows
Instalar docker con vagrant
{{< /objetivos >}}

### Referencias para instalar ubuntu
{{<referencias title="Instalar Docker" sub_title="Páginas oficiales" icon="fab fa-docker">}}
Instalar docker: Se ha de ir a la referencia de <strong>la página oficial de docker</strong> (https://docs.docker.com/install)
Instalar docker en <strong>ubuntu</strong>   (https://docs.docker.com/install/linux/docker-ce/ubuntu/)
Instalar docker en <strong>windows</strong> (https://docs.docker.com/docker-for-windows/install/)
Instalar docker en <strong>mac</strong> (https://docs.docker.com/desktop/install/mac-install)
{{</referencias>}}

### Proceso de instalación en Ubuntu

1. {{< color >}} Paquetes necesarios durante la instalación {{< /color >}}: usaremos certificados {{< color >}} (ca-certificates) {{< /color >}}. Descargamos con {{< color >}} curl {{< /color >}}, usaremos claves públicas y privadas {{< color >}} (gnupg-agent) {{< /color >}} y conoceremos la versión de nuestro sistema {{< color >}} (lsb-release) {{< /color >}}, lo que nos permitirá hacer una instalación genérica.

{{< highlight bash "linenos=table, hl_lines=1" >}}
sudo apt-get install ca-certificates curl gnupg-agent lsb-release
{{< /highlight >}}

2. {{< color >}} Añadimos la clave GPG oficial de Docker {{< /color >}}

{{< highlight bash "linenos=table, hl_lines=1 2" >}}
curl -fsSL https://download.docker.com/linux/ubuntu/gpg | \
sudo gpg --dearmor -o /usr/share/keyrings/docker-archive-keyring.gpg
{{< /highlight >}}

3. Añadimos el repositorio {{< color >}} stable {{< /color >}} (Proporciona últimas versiones). Otras opciones (modificar stable por la opción deseada):

	- {{< color >}} test {{< /color >}}: Versiones listas para probar.
	- {{< color >}} nightly {{< /color >}}: Actualizaciones de la próxima versión.

{{< highlight bash "linenos=table, hl_lines=1-5" >}}
echo \
"deb [arch=$(dpkg --print-architecture) \
signed-by=/usr/share/keyrings/docker-archive-keyring.gpg] \
https://download.docker.com/linux/ubuntu \
$(lsb_release -cs) stable" | sudo tee /etc/apt/sources.list.d/docker.list > /dev/null
{{< /highlight >}}

4. {{< color >}} Actualizamos el índice de los paquetes apt e instalamos Docker {{< /color >}}: el cliente de Docker ***docker-ce-cli***, el demonio de Docker ***docker-ce*** y el runtime de contenedores que gestiona su ejecución ***containerd.io***. La construcción y administración de contenedores e imágenes la gestiona el demonio docker-ce.

{{< highlight bash "linenos=table" >}}
sudo apt-get update
sudo apt-get install docker-ce docker-ce-cli containerd.io
{{< /highlight >}}

5. {{< color >}} Agregamos el usuario actual al grupo de Docker {{< /color >}} (para poder usar Docker sin sudo), de lo contrario, no podremos hacerlo:

{{< highlight bash "linenos=table, hl_lines=1" >}}
sudo usermod -aG docker $USER
{{< /highlight >}}

6. {{< color >}} Cambiamos al grupo {{< /color >}} de Docker en la sesión actual. Nota: para que el cambio aplique a otras sesiones, será necesario cerrar sesión o reiniciar.

{{< highlight bash "linenos=table, hl_lines=1" >}}
newgrp docker
{{< /highlight >}}

7. {{< color >}} Probamos la instalación {{< /color >}} listando los comandos disponibles de Docker:

{{< highlight bash "linenos=table, hl_lines=1" >}}
docker help
{{< /highlight >}}

### Instalación de Docker en Windows

1. {{< color >}} Descargar Docker Desktop Installer {{< /color >}}: Para instalar Docker en Windows, descarga el fichero **Docker Desktop Installer.exe** y ejecútalo. También puedes usar el siguiente comando en la línea de comandos:

   {{< highlight bash "linenos=table, hl_lines=1" >}}
   Start-Process '.\Docker Desktop Installer.exe' install
   {{< /highlight >}}

   Docker no se instala directamente sobre Windows. Necesita una capa de virtualización ya que Docker corre sobre Linux.

2. {{< color >}} Opciones de virtualización {{< /color >}}: Durante la instalación, elige entre **Hyper-V** o **WSL**.
	- Si dockerizarás sistemas Windows, usa **Hyper-V**.
	- Para otros casos, se recomienda **WSL** por eficiencia. Ésta debe de ser la opción seleccionada en nuestro caso.

   [Más información en la documentación oficial de Docker](https://docs.docker.com/docker-for-windows/install/).

---

#### Arrancar el Servicio

1. {{< color >}} Activar Docker Desktop {{< /color >}}: Tras la instalación, Windows no activa Docker automáticamente. Debes hacerlo manualmente:
	- Busca la aplicación Docker Desktop y ejecútala.
	- La primera vez, Docker te informará sobre el uso gratuito para pequeñas empresas.
    - Una vez abierta puedes configurarla para que se arranque automáticamente cada vez que arranque el sistema

---

### Crear contenedores de Windows

1. {{< color >}} Configuración para contenedores de Windows {{< /color >}}: Para crear contenedores de Windows, necesitas activarlos en el demonio.
	- Ve al servicio Docker y abre el menú contextual.
	- Selecciona la opción **switch to Windows containers…**.

   > En este curso, no configuraremos contenedores de Windows.

---

### Interfaz Gráfica en Windows

1. {{< color >}} Uso de la interfaz gráfica {{< /color >}}: Docker Desktop en Windows proporciona una interfaz gráfica para gestionar contenedores, imágenes y configuraciones de manera visual.
2. En cualquier caso, recomendamos que abras un power shell en windows y realices las acciones en el terminal.

---

### Configuración de Docker Desktop

1. {{< color >}} Personalización de Docker Desktop {{< /color >}}: Docker Desktop permite ajustar configuraciones avanzadas para personalizar el rendimiento y los recursos asignados.
