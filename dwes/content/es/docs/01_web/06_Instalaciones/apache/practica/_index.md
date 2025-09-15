+++
title = 'practicando'
date = 2024-10-15T07:04:49+02:00
draft = false
icon = "fas fa-chalkboard-teacher"
weight = 10
+++
 
{{% pageinfo %}}

#### Practicando 

Creamos en nuestro servidor web, dos sitios virtuales o virtual host, llamados www.informatica.com y www.musica.com
Cada uno de ellos van a tener esta peculiaridad de comportameiento y es que www.informatica.com va a ir a buscar los recursos a la carpeta /var/www/informatica, y www.muscia.com, a /var/www/musica

{{% /pageinfo %}}
### Creando los ficheros de configuración 

Para configurar dos sitios en Apache, vamos a crear dos archivos de configuración en `sites-available` y luego activarlos.

Lo primero vamos a la carpeta /etc/apache2/site-available, y nos copiamos el fichero de configuración que hay ahí {{< color >}} 000-default.conf  {{< /color >}} a por ejemplo {{< color >}} informatica.conf {{< /color >}} y {{< color >}} musica.conf {{< /color >}}.
Recuerda que son ficheros de confituración y debemos hacerlo como superusuario
{{< highlight php "linenos=table, hl_lines=1" >}}
sudo cp 000-default.conf informatica.conf 
sudo cp 000-default.conf musica.conf 
{{< / highlight >}}
* Modificamos el dfichero con la nueva configuración
* Para ello lo editamos con un editor, por ejemplo **gedit**
{{< highlight php "linenos=table, hl_lines=1" >}}
sudo gedit informatica.conf
{{< / highlight >}}
* y añadimos las siguientes líneas
{{< highlight php "linenos=table, hl_lines=2 3" >}}
  <VirtualHost *:80>
  ServerName www.informatica.com
  DocumentRoot /var/www/informatica
  </VirtualHost>
{{< / highlight >}}
* El fichero original tiene muchas más líneas que podemos eliminar
* Todas las líneas que empiecen por **#**, son comentarios que no tienen efecto en la configuración.
* Hacemos lo mismo en {{< color >}}musica.conf{{< /color >}}
* {{< highlight php "linenos=table, hl_lines=1" >}}
sudo gedit musuca.conf
{{< / highlight >}}
* y añadimos su configuración
  {{< highlight php "linenos=table, hl_lines=2 3" >}}
  <VirtualHost *:80>
  ServerName www.musica.com
  DocumentRoot /var/www/musica
  </VirtualHost>
  {{< / highlight >}}


### Modificación del archivo hosts

Para realizar pruebas en local, añade los siguientes dominios al archivo `hosts` en tu equipo. 

En Ubuntu, el archivo se encuentra en `/etc/hosts`; en Windows, en `c:\windows\system32\drivers\etc\hosts`. Añade estas líneas:

{{< highlight bash "linenos=table, hl_lines=1 2" >}}
127.0.0.1 www.informatica.com 
127.0.0.1 www.musica.com 
{{< / highlight >}}

Luego, puedes probar que los dominios responden ejecutando:

{{< highlight bash "linenos=table, hl_lines=1" >}}
ping www.informatica.com
ping www.musica.com
{{< / highlight >}}

### Activación de los sitios

Una vez que hayas creado estos archivos de configuración en `sites-available`, debes activarlos usando los siguientes comandos:

{{< highlight bash "linenos=table, hl_lines=1" >}}
sudo a2ensite informatica.conf
sudo a2ensite musica.conf
sudo systemctl reload apache2
{{< / highlight >}}

Esto creará los enlaces simbólicos en `sites-enabled` y recargará Apache para aplicar la configuración.

#### Creando el directorio
Ahora debemos de crear los directorios que hemos especificado para que apache vaya ahí, a buscar los recursos cuando se los soliciten.

Lo podemos hacer con nuestro edi, por ejemplo phpstorm.

Vamos a crear carpetas en {{< color >}} /var/www {{< /color >}}, por lo que tenemos que tener permisos de escritura y ser propietarios.
![img.png](img.png)
Ahí vemos que esta carpeta es de root, y nosotros no podremos crear recuros
Para ello ejecutamos el comando de cambiar de propietario (en nuestro ordenador somos {{< color >}} alumno {{< /color >}}. Yo en el ejemplo, como en mi equipo soy {{< color >}} manuel {{< /color >}} pongo a ese usuario 
Podemos especificar la carpeta con ruta absoluta
{{< highlight php "linenos=table, hl_lines=1" >}}
sudo chown manuel:manuel /var/www
{{< / highlight >}}
y me habrá cambiado el propietario

![img_1.png](img_1.png)

Ahora creamos las carpetas y recursos y ya los puedo acceder desde el navegador


