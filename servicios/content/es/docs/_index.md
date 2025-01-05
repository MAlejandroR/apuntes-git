---
title: "Servicios en Despliegue de Aplicaciones Web"
linkTitle: "Servicios"
weight: 50
date: 2024-12-18
description: >
  Exploramos servicios esenciales para el despliegue de aplicaciones web.
icon: fas fa-network-wired
draft: false
---
{{% line %}}
{{< objetivos sub_title="Servicios esenciales en despliegue de aplicaciones web" >}}
Servidores web
Acceso remoto 
Transferencia de ficheros
Resolución de dominios
Instalación y uso
{{</objetivos >}}
{{< alert title="Es base para todo" color="warning" >}}
Seguiremos profundizando y utilizándolos a lo largo del curso usándolos en aws
{{< /alert >}}
{{< color >}} Servicios a Estudiar {{< /color >}}
- {{< color >}}Apache{{< /color >}} y {{< color >}}Nginx{{< /color >}}: Servidores web.
- {{< color >}}SSH{{< /color >}} y {{< color >}}Telnet{{< /color >}}: Acceso remoto.
- {{< color >}}FTP{{< /color >}}: Transferencia de archivos.
- {{< color >}}DNS{{< /color >}}: Resolución de nombres de dominio.

{{< alert title="Fundamental saber" color="success" >}}
Qué son, cómo funcionan y por qué son importantes.  
{{< /alert >}}


{{% line %}}

{{< definicion title="¿Qué es un servicio?" icon="fas fa-cogs">}}
Un {{< color >}}servicio{{< /color >}} en el contexto del despliegue web es {{< color >}} un programa o conjunto de programas {{< /color >}} diseñados para proporcionar funcionalidades específicas a través de una red, facilitando la comunicación y operación de aplicaciones.     

{{</definicion>}}

{{% line %}}
### Servicios principales
Para poder utilizar un servicio, lógicamente necesitamos un programa que lo implemente, que podamos instalar y administrar para poderlo utilizar según nuestras necesidades.

Los servicios que usamos implementan protocolos de la familia TCP/IP.

Vamos a estudiar:

| **Protocolo** | **Puerto** | **Programa o implementación** |
|--------------|-----------|--------|---------------------------|
| HTTP/HTTPS| 80/443 | {{< color >}} Apache HTTP Server {{< /color >}}        |
| HTTP/HTTPS| 80/443 | {{< color >}} Nginx {{< /color >}}        |
| DNS         | 53     | {{< color >}} Bind {{< /color >}}                     |
| SSH          | 22     | {{< color >}} OpenSSH {{< /color >}}                  |
| FTP                | 20/21  | {{< color >}} vsftpd, ProFTPD, Pure-FTPd {{< /color >}}|
| SFTP               | 22     | {{< color >}} OpenSSH {{< /color >}}                  |

#### {{< color >}}Apache{{< /color >}} y {{< color >}}Nginx{{< /color >}}

{{< alert title="Servidores Web" color="blue" >}}
Apache y Nginx son los servicios más comunes para alojar aplicaciones web. Ambos actúan como intermediarios entre el usuario y la aplicación, gestionando peticiones HTTP/HTTPS.
{{< /alert >}}


#### {{< color >}}SSH{{< /color >}} y {{< color >}}Telnet{{< /color >}}

{{< alert title="Acceso remoto" color="green" >}}
SSH permite conexiones seguras a través de una red para administración remota. Telnet, aunque menos seguro, puede ser útil para pruebas específicas.
{{< /alert >}}

#### {{< color >}}FTP{{< /color >}}

{{< alert title="Transferencia de Archivos" color="orange" >}}
FTP es un protocolo para transferir archivos entre clientes y servidores. Aunque ha sido en parte reemplazado por SFTP y SCP, sigue siendo relevante en entornos específicos.
{{< /alert >}}

#### {{< color >}}DNS{{< /color >}}

{{< alert title="Resolución de nombres" color="purple" >}}
El servicio DNS traduce nombres de dominio legibles para humanos (como ejemplo.com) en direcciones IP que las computadoras entienden.
{{< /alert >}}

{{% line %}}

### Finalidad

{{< finalidad >}}

- Comprender qué es un servicio y su función en el despliegue de aplicaciones web.
- Instalar, configurar y administrar servicios como Apache, Nginx, SSH, FTP y DNS.
- Identificar las diferencias y casos de uso de cada servicio.

{{</finalidad>}}

{{% line %}}

### Referencias

{{< referencias icon_image="documentacion.png" title="Referencias" sub_title="Fuentes de información confiables" >}}

- [Documentación oficial de Apache](https://httpd.apache.org/docs/)
- [Guía oficial de Nginx](https://nginx.org/en/docs/)
- [Introducción a SSH](https://www.ssh.com/ssh/)
- [Protocolo FTP](https://tools.ietf.org/html/rfc959)
- [DNS explicado](https://www.cloudflare.com/learning/dns/what-is-dns/)

{{< /referencias >}}