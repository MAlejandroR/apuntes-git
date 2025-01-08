---
title: "VirtualHost"
linkTitle: "VirtualHost"
weight: 10
date: 2024-12-18
icon: fas fa-key
draft: false
---

{{< objetivos sub_title="Configuración de Apache" >}}
Hosts Virtuales.
{{< /objetivos >}}

## Hosts Virtuales

Para entender qué son los hosts virtuales vamos a establecer una analogía.
Imaginemos que tenemos una persona llamada **Manuel**. En el trabajo, le llaman **_Manuel_** y adopta una actitud profesional y
seria. En casa o con amigos, le llaman **_Manolo_** y su actitud es más relajada y cercana. Aunque es la misma persona,
_responde de manera diferente según cómo le llamen._

{{< imgproc manuel-manolo Fill "400x400" >}}

{{< /imgproc >}}

De forma similar, en Apache, {{< color >}} un Virtual Host permite que el mismo servidor web responda de manera distinta
según el nombre de dominio o dirección con la que se le acceda {{< /color >}}, en función de la configuración que tenga
establecdida para cada uno de los Host Virtuales.

Siguiendo con la metáfora, es como si fuera **Manuel** en un contexto y **Manolo** en otro.

Con {{< color >}} Virtual Hosts {{< /color >}}, Apache puede manejar varios sitios web en un solo servidor, mostrando
diferentes contenidos o configuraciones según el dominio que se utilice.
Lógicamente primero tendremos que establecer que varios nombres de dominio cada uno de los cuales va a corresponder a un
host virtual, apunten a la misma ip.
{{< imgproc virtual_host Fill "673x295" >}}
https://medium.com/@jhordydelaguila/creando-y-configurando-virtual-host-con-apache-para-xampp-windows-f90c2b0527ac
{{< /imgproc >}}

Apache permite alojar múltiples sitios web mediante Hosts Virtuales, que son configuraciones específicas para cada sitio
en el servidor. Los Virtual Hosts pueden clasificarse según cómo Apache distingue entre ellos:

1. **Basados en IP:**  
   El servidor responde a diferentes direcciones IP configuradas en la máquina. Este método es útil cuando se dispone de
   múltiples IPs.
   {{< highlight bash "linenos=table, hl_lines=1" >}}
      <VirtualHost 192.168.56.100:80>
          DocumentRoot /var/www/misitio1
      </VirtualHost>
      <VirtualHost 192.168.56.200:80>
            DocumentRoot /var/www/misitio2
      </VirtualHost>
   {{< / highlight >}}

   2. **Basados en puerto de escucha:**  
      El servidor distingue entre solicitudes que llegan a puertos diferentes, como 80 para HTTP y 443 para HTTPS,u otros
      que estableciéramos.
      {{< highlight bash "linenos=table, hl_lines=1" >}}
         <VirtualHost *:80>
            DocumentRoot /var/www/misitio1
         </VirtualHost>
         <VirtualHost *:443>
             DocumentRoot /var/www/misitio2
         </VirtualHost>
         <VirtualHost *:8080>
              DocumentRoot /var/www/misitio3
         </VirtualHost>
      {{< / highlight >}}


3. **Basados en nombre de servidor (el más común):**  
   El servidor utiliza el encabezado HTTP `Host` enviado por el cliente para identificar el sitio solicitado. Este
   método permite alojar múltiples sitios en una misma IP y puerto.
   {{< highlight bash "linenos=table, hl_lines=1" >}}
   <VirtualHost *:80>
      DocumentRoot /var/www/misitio1
      ServerName www.sitio1 
   </VirtualHost>
   <VirtualHost *:80>
      DocumentRoot /var/www/misitio2
      ServerName www.sitio2
   </VirtualHost>
   <VirtualHost *:80>
      DocumentRoot /var/www/misitio3
      ServerName www.sitio3 
   </VirtualHost>
   {{< / highlight >}}


Para gestionar los hosts, edita el archivo /etc/hosts o configura un DNS local.

{{% line %}}

**Nota:** Si hemos configurado nuestro sitio con opciones específicas, estas deben establecerse en la zona del VirtualHost que use SSL (puerto 443). Esto se debe a que las peticiones redirigidas desde HTTP (puerto 80) a HTTPS (puerto 443) solo aplicarán configuraciones realizadas en este último. Por ejemplo:

{{< highlight dockerfile "linenos=table" >}}
<VirtualHost *:443>
DocumentRoot /var/www/seguro
SSLEngine On
SSLCertificateFile /etc/ssl/certs/ssl-cert-snakeoil.pem
SSLCertificateKeyFile /etc/ssl/private/ssl-cert-snakeoil.key
</VirtualHost>
{{< /highlight >}}

{{% line %}}


### Practicando: 

Vamos a crear tres sitios web con Virtual Hosts en Apache, cada uno con un DocumentRoot diferente, y configurarlos para que sean accesibles desde los siguientes nombres de dominio:

{{< highlight bash "linenos=table, hl_lines=1-3" >}}
www.musica.com
www.informatica.com
www.nombre_alumno.com

{{< / highlight >}}

Cada sitio tendrá su propio archivo HTML en su directorio correspondiente.

#### {{< color >}} Pasos a realizar {{< /color >}}
1. **Crear los directorios para los sitios web**.   
   Primero, crea los directorios donde estarán los archivos de cada sitio web:

{{< highlight bash "linenos=table" >}}
 mkdir -p /var/www/musica 
 mkdir -p /var/www/informatica 
 mkdir -p /var/www/nombre_alumno 
{{< /highlight >}}

2. **Crear archivos HTML básicos**    
   Agrega un archivo index.html en cada directorio con contenido personalizado para cada sitio:

{{< highlight bash "linenos=table" >}}
 echo "<h1>Bienvenidos a Música</h1>" >> /var/www/musica/index.html  
 echo "<h1>Bienvenidos a Informática</h1>">>  /var/www/informatica/index.html
 echo "<h1>Bienvenidos a Mi Sitio</h1>" >> /var/www/nombre_alumno/index.html
{{< /highlight >}}

3. **Configurar Virtual Hosts en Apache**   
   Edita o crea los archivos de configuración de Virtual Hosts en /etc/apache2/sites-available/.

Primero, crea el archivo para musica:

{{< highlight bash "linenos=table" >}} 
sudo nano /etc/apache2/sites-available/musica.conf 
{{< /highlight >}}

Contenido del archivo **musica.conf**:

{{< highlight apache "linenos=table" >}}
   <VirtualHost *:80> 
      ServerName www.musica.com 
      DocumentRoot /var/www/musica 
   </VirtualHost> 
{{< /highlight >}}

Repetimos  para los otros sitios:


Contenido del archivo informatica.conf:

{{< highlight bash "linenos=table" >}}
   sudo nano /etc/apache2/sites-available/informatica.conf 
{{< /highlight >}}
{{< highlight apache "linenos=table" >}}
   <VirtualHost *:80>
      ServerName www.informatica.com
      DocumentRoot /var/www/informatica
   </VirtualHost>
{{< /highlight >}}


Y para nombre_alumno:
{{< highlight bash "linenos=table" >}}
   sudo nano /etc/apache2/sites-available/nombre_alumno.conf
{{< /highlight >}}
{{< highlight apache "linenos=table" >}}
   <VirtualHost *:80>
      ServerName www.nombre_alumno.com
      DocumentRoot /var/www/nombre_alumno
   </VirtualHost>
{{< /highlight >}}

4. **Habilitar los Virtual Hosts**
   Habilita los sitios usando {{< color >}} a2ensite {{< /color >}} y reinicia Apache:

{{< highlight bash "linenos=table" >}} 
   sudo a2ensite musica.conf 
   sudo a2ensite informatica.conf 
   sudo a2ensite nombre_alumno.conf
   sudo systemctl reload apache2 
{{< /highlight >}}
{{< alert title="Observa" color="success" >}}
Ahora puedes observar cómo en la carpeta **site_enabled**, están los ficheros como enlaces simbólicos
{{< /alert >}}

5. **Editar el archivo /etc/hosts**   
Debemos de acceder al servidor con una sola ip usando los diferentes nombres establecidos en los server name.     
Para ello editamos el archivo /etc/hosts en tu máquina para probar los sitios localmente:

{{< highlight bash "linenos=table" >}}
sudo nano /etc/hosts 
{{< /highlight >}}
{{< highlight php "linenos=table, hl_lines=1" >}}
127.0.0.1 www.musica.com
127.0.0.1 www.informatica.com
127.0.0.1 www.nombre_alumno.com

{{< / highlight >}}
6. **Probar los sitios**
   Ahora es el momento de probar el funcionamiento de los dominios establecidos
>>http://www.musica.com   
  http://www.informatica.com    
  http://www.nombre_alumno.com


#### ServerAlias
La directiva {{< color >}} ServerAlias {{< /color >}} en Apache permite añadir nombres de dominio alternativos que serán gestionados por el mismo Virtual Host.    
Esto puede ser útil cuando queremos que un sitio web responda a diferentes nombres de dominio, como versiones con o sin "www" o dominios adicionales.

La configuración del Virtual Host sería:

{{< highlight apache "linenos=table" >}}
   <VirtualHost *:80> 
      ServerName www.musica.com 
      ServerAlias musica.com www.musica.es musica.es 
      DocumentRoot /var/www/musica 
   </VirtualHost> 
{{< /highlight >}}

* {{< color >}} ServerName {{< /color >}}: Define el dominio principal del sitio (www.musica.com en este caso).
* {{< color >}} ServerAlias {{< /color >}}: Añade dominios adicionales que apuntan al mismo sitio, permitiendo que Apache gestione las solicitudes correctamente.

Supongamos que queremos que el sitio www.musica.com también responda a los siguientes nombres:
{{< highlight php "linenos=table, hl_lines=1-3" >}}
http://www.musica.com:8080
http://musica.com:8080
http://musica.es:8080
{{< / highlight >}}
Y vemos las imágenes:
{{% line %}}
{{< imgproc 1_musica Fill "460x89" >}}

{{< /imgproc >}}
{{< imgproc 2_musica  Fill "460x89" >}}

{{< /imgproc >}}
{{< imgproc  3_musica Fill "460x89" >}}

{{< /imgproc >}}

{{< alert title="Importante" color="warning" >}}
Es necesario  modificar también el fichero /etc/hosts para conseguir alcanzar con esos nombres de dominio **_al equipo_** donde está instalado el servicio **apache**
{{< highlight php "linenos=table, hl_lines=1-3" >}}
127.0.0.1  www.informatica.com  informatica.com informatica.es
127.0.0.1  www.musica.com musica.com musica.es
127.0.0.1  www.manuel.com manuel.com manuel.es

{{< / highlight >}}
{{< /alert >}}

### usuarios y grupos
Podemos personalizar a qué usuarios queremos dejar acceso, es decir, no tiene por qué tener acceso todos los usuarios al mismo sitio indistintamente que estén incluídos en el fichero de password establecido
