---
title: "Sistema base de entorno"
linkTitle: "Entorno de ejecución "
weight: 1
date: 2024-12-18
description: >
   Vamos a trabajar bajo  **ubuntu server** que virtualizaremos en **virtual box** usando **vagrant**.
icon: fas fa-cube
draft: false
---

{{< objetivos sub_title="Configuración de Apache" >}}
Usar Vagrant  
Revisar fichero de configuración  
Instalar Ubuntu Server  
Conectar o levantar la máquina de Ubuntu para trabajar  
{{< /objetivos >}}
{{< referencias  >}}
https://web.infenlaces.com/despliegue/contenido/docs/02_linux/

{{< /referencias >}}
  
{{% line %}}

### **Comandos básicos de Vagrant**

Para gestionar las máquinas virtuales con Vagrant utilizaremos los siguientes comandos:

1. **Iniciar la máquina virtual**  
   {{< highlight bash "linenos=table" >}}
   vagrant up
   {{< /highlight >}}

2. **Conectarse a la máquina virtual**  
   {{< highlight bash "linenos=table" >}}
   vagrant ssh
   {{< /highlight >}}

3. **Detener la máquina virtual**  
   {{< highlight bash "linenos=table" >}}
   vagrant halt
   {{< /highlight >}}

4. **Reiniciar la máquina virtual**  
   {{< highlight bash "linenos=table" >}}
   vagrant reload
   {{< /highlight >}}

5. **Destruir la máquina virtual** (elimina todos los datos asociados):  
   {{< highlight bash "linenos=table" >}}
   vagrant destroy
   {{< /highlight >}}

{{% line %}}

### **Configuración del archivo Vagrantfile**

El siguiente ejemplo de configuración en el archivo `Vagrantfile` instala **Ubuntu Server 24**, mapea puertos para servicios específicos y comparte una carpeta local con la máquina virtual:

{{< highlight ruby "linenos=table" >}}
Vagrant.configure("2") do |config|
# Configuración de la caja base
config.vm.box = "ubuntu/jammy64"

# Asignar nombre a la máquina virtual
config.vm.hostname = "vagrant-ubuntu24"

# Configurar red y mapeo de puertos
config.vm.network "forwarded_port", guest: 80, host: 8080  # Apache/Nginx
config.vm.network "forwarded_port", guest: 22, host: 2222  # SSH
config.vm.network "forwarded_port", guest: 21, host: 2121  # FTP
config.vm.network "forwarded_port", guest: 53, host: 5353  # DNS

# Compartir una carpeta entre anfitrión y máquina virtual
config.vm.synced_folder "./app", "/var/www/html"

# Configuración del proveedor VirtualBox
config.vm.provider "virtualbox" do |vb|
vb.memory = "1024"
vb.cpus = 2
end
end
{{< /highlight >}}

{{% line %}}

### **Notas importantes**

{{< alert title="Configuración adicional" color="info" >}}
Para que los servicios como Apache o FTP funcionen correctamente en los puertos configurados, asegúrate de instalar y configurar los paquetes necesarios dentro de la máquina virtual.
{{< /alert >}}

### Conexiones a la red
Es importante recordad los tipos de conexiónes que establecemos en el fichero Vagrantfile
![net_vagrant.webp](net_vagrant.webp)
| **Conexiones**       | **Red Host-VirtualHost** | **Red Local**          | **Internet**          | **Red entre Host y todas las Virtual Host** | **Parámetro de conexión**        |
|-----------------------|--------------------------|-------------------------|------------------------|--------------------------------------------|-----------------------------------|
| **Private Network**   | Sí                      | No                      | No (salvo con NAT)    | Sí                                         | `private_network`                |
| **Host-Only Network** | Sí                      | No                      | No                    | No                                         | Automática (Host-Only)           |
| **Bridged Network**   | Sí                      | Sí                      | Sí                    | No                                         | `public_network`                 |
| **NAT**               | No                      | No                      | Sí                    | No                                         | NAT por defecto                  |

{{< color >}} Explicación {{< /color >}}
* **Red Host-VirtualHost**: Conexión directa entre el anfitrión y la máquina virtual.
* **Red Local**: Acceso desde y hacia otros dispositivos en la red local del anfitrión.
* **Internet**: Acceso a Internet desde la máquina virtual.
* **Red** entre Host y todas las Virtual Host: Conexión entre el anfitrión y todas las máquinas virtuales configuradas.
* **Parámetro de conexión**: Configuración utilizada en el archivo Vagrantfile.