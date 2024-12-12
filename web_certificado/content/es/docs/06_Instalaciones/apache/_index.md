+++
title = 'Apache'
date = 2024-10-15T07:04:49+02:00
draft = false
icon = "fas fa-feather"
weight = 10
+++

{{< imgproc apache Fill "318x159" >}}
Servidor Web
{{< /imgproc >}}
#### 
****
### Servidor Apache y su funcionamiento modular
{{< imgproc apache2 Fill "930x454" >}}

{{< /imgproc >}}
Como se muestra en la imagen, Apache funciona mediante un sistema de módulos. 

Cada uno de estos módulos (como **PHP**, **MySQL**, **XML**, entre otros) añade funcionalidades específicas y se conecta al **núcleo de Apache**. 

Puedes activar o desactivar, instalar o desinstalar módulos según tus necesidades, manteniendo solo aquellos que sean esenciales.

Es importante recordar que, al instalar Apache, se abre una "puerta" en el sistema hacia redes externas, lo que puede representar una exposición al exterior.

Mantener activos solo los módulos necesarios reduce esta exposición y ayuda a mejorar la seguridad del servidor.

## Consideraciones de seguridad

Cuando instalas y configuras Apache en tu sistema, estás abriendo una "puerta" que permite el acceso desde redes externas. Esto significa que, en cierta medida, tu sistema está expuesto al exterior, lo que podría representar un riesgo de seguridad si no se toman las precauciones adecuadas.

Para minimizar esta exposición, es importante:
- {{< color >}} Mantener actualizados {{< /color >}} tanto Apache como sus módulos.
- {{< color >}} Configurar adecuadamente {{< /color >}} los permisos y accesos, limitando el acceso a solo aquellos que necesiten interactuar con el servidor.
- {{< color >}} Deshabilitar módulos innecesarios{{< /color >}}, ya que cada módulo adicional aumenta las posibles vulnerabilidades.

Recuerda que el uso seguro de Apache es esencial para proteger la infraestructura de red y los datos alojados en el servidor.

### Módulos a instalar
{{< imgproc instalacion_web Fill "712x484" >}}

{{< /imgproc >}}

{{< alert title="Instalación en windows" color="success" >}}
* En windows se instala todo instalando el paquete Xampp(https://www.apachefriends.org/es/index.html), o Wampp (https://www.wampserver.com/en/)

* Una vez instalado debes de activarlo o arrancar los servicios correspondientes
{{< /alert >}}
### Concepto del virtual host
Ponamos la siguiente analogía:
Imaginemos que tenemos una persona llamada Manuel. En el trabajo, le llaman "Manuel" y adopta una actitud profesional y seria. En casa o con amigos, le llaman "Manolo" y su actitud es más relajada y cercana. Aunque es la misma persona, responde de manera diferente según cómo le llamen.

{{< imgproc manuel-manolo Fill "400x400" >}}

{{< /imgproc >}}

De forma similar, en Apache, {{< color >}} un Virtual Host permite que el mismo servidor web responda de manera distinta según el nombre de dominio o dirección con la que se le acceda {{< /color >}}.

Siguiendo con la metáfora, es como si fuera **Manuel** en un contexto y **Manolo** en otro.

Con {{< color >}} Virtual Hosts {{< /color >}}, Apache puede manejar varios sitios web en un solo servidor, mostrando diferentes contenidos o configuraciones según el dominio que se utilice.

### Dónde se configura cada Virtual Host

Los ficheros de configuración de Apache están en `/etc/apache2`. En la imagen puedes ver cómo ubicarte y qué ficheros contiene.
{{< imgproc ficheros_configuracion_apache Fill "805x712" >}}

{{< /imgproc >}}
Observa los comandos utilizados
{{< highlight php "linenos=table, hl_lines=1" >}}
cd #change directory para cambiar de directorio
pwd #print work directory ver el directorio actual de trabajo
tree -L 1 # ver el contenido de un directorio con nivel 1 de profundidad con formato arbolescente. nivel 1 es no mostrar los subdirectorios
{{< / highlight >}}
La configuración de los {{< color >}} sitios web {{< /color >}} está bajo los directorios {{< color >}} sites-available {{< /color >}} y {{< color >}} sites-enabled {{< /color >}}.

* Después, para  actívalo en {{< color >}} sites-enabled {{< /color >}} usando el comando  {{< color >}} a2ensite nombre_sitio {{< /color >}}. Este comando crea un enlace simbólico que permite poner el sitio en funcionamiento.

#### Cómo crear nombres diferentes para mi máquina

Para tener nombres únicos accesibles desde internet, lo ideal es comprar un dominio en un **ISP** (Proveedor de Servicios de Internet) y configurarlo para que apunte a tu máquina.

Sin embargo, para hacer pruebas en local, puedes modificar el archivo {{< color >}} hosts {{< /color >}} en tu equipo.
En ubuntu este fichero está ubicado en {{< color >}} /etc/hosts {{< /color >}}, y en Windows en {{< color >}} c:\windows\system32\drivers\etc\hosts {{< /color >}}.

Este archivo permite asignar nombres personalizados a direcciones IP en tu red local.

Por ejemplo, puedes añadir las siguientes líneas al archivo `hosts` para asociar los dominios locales a `localhost`:

{{< highlight bash "linenos=table, hl_lines=1" >}}
127.0.0.1 www.informatica.com 
127.0.0.1 www.musica.com 
{{< / highlight >}}

Una vez que hayas agregado el nombre en {{< color >}} hosts {{< /color >}}, puedes probar que funciona ejecutando un {{< color >}} `ping` {{< /color >}} al nombre que has configurado, como por ejemplo:

{{< highlight bash "linenos=table, hl_lines=1" >}}
ping www.informatica.com
{{< / highlight >}}

### Directivas a configurar

Apache se configura a través de {{< color >}} **directivas** {{< /color >}}, que son como variables que definen el comportamiento del servidor al cargar el servicio.

Siguiendo con la metáfora anterior de "Manuel" y "Manolo", donde se establecen comportamientos distintos según el contexto, aquí concretaremos esos comportamientos deseados.

Algunas de las directivas más importantes son:

* {{< color >}} ServerName {{< /color >}}: Define el nombre del servidor o dominio que vamos a asociar a una configuración específica. Esto indica el nombre con el que el servidor responderá.

* {{< color >}} DocumentRoot {{< /color >}}: Especifica el directorio donde Apache debe buscar los archivos de los recursos. Aquí se encuentra el contenido que será servido a los usuarios cuando accedan al sitio.

Al configurar estas directivas, estamos definiendo cómo se comportará Apache y cómo gestionará las solicitudes para cada sitio web.

{{< alert title="Muy importante" color="warning" >}}
Siempre que modifiquemos alguna directiva de configuración, debemos rebotar el servicio
{{< highlight php "linenos=table, hl_lines=1" >}}
sudo service apache2 restart
{{< / highlight >}}
{{< /alert >}}


 
