---
title: "Proxy inverso o Reverse prxy"
linkTitle: "Proxy inverso"
weight: 80

icon: fa-regular fa-file-code
---
## Proxy y Proxy Inverso

### 1. Proxy
{{<definicion title="Qué es un proxy" icon="fas fa-network-wired">}}
Un {{< color >}}proxy{{< /color >}} es un servidor intermedio que actúa como {{< color >}} puente {{< /color >}} entre {{< color >}} un cliente y un servidor {{< /color >}}.
{{</definicion>}}

Cuando un cliente solicita acceder a un recurso en Internet, el proxy redirige esa solicitud al servidor, recibe la respuesta y se la devuelve al cliente.

**Función principal**:
- Ocultar la identidad del cliente (anonimato).
- Filtrar contenido, controlar accesos o mejorar el rendimiento mediante caché.

{{< imgproc proxy Fill "700x529" >}}
Imagen obtenida de https://www.redeszone.net/tutoriales/servidores/diferencias-proxy-vs-proxy-inverso/
{{< /imgproc >}}

En la imagen podemos ver el ejemplo:
> * Un usuario quiere acceder a una página web.
> * Su solicitud pasa primero por un servidor proxy que redirige la conexión, de modo que el servidor web no ve directamente al cliente, sino al proxy.

---

#### 2. Proxy Inverso (reverse proxy)
Un {{< color >}} 1_proxy inverso {{< /color >}} (también llamado **reverse proxy**) es un servidor que se sitúa frente a uno o más servidores y gestiona las solicitudes de los clientes antes de enviarlas a los servidores finales.
De alguna forma la diferencia es que colocamos el servidor proxy después de internet, y no antes (*proxy directo*)
{{% line %}}

{{< color >}} Proxy directo {{< /color >}}
{{< imgproc proxy_directo Fill "700x297" >}}
https://www.cloudflare.com/es-es/learning/cdn/glossary/reverse-proxy/
{{< /imgproc >}}
{{< color >}} Proxy reverse {{< /color >}}
{{< imgproc 3_proxy_reverse Fill "700x297" >}}
https://www.cloudflare.com/es-es/learning/cdn/glossary/reverse-proxy/
{{< /imgproc >}}
{{% line %}}
{{< color >}} El serivido proxy {{< /color >}}


**Función principal**:
- Actuar como intermediario entre los clientes y los servidores internos, con objetivos como:
    - Distribuir la carga entre varios servidores (balanceo de carga).
    - Mejorar la seguridad ocultando los servidores reales.
    - Servir contenido en caché para acelerar la entrega.
    - Gestionar múltiples subdominios o servicios desde un único punto de entrada.

**Ejemplo**:  
Cuando accedes a `www.miweb.com`, el proxy inverso determina si tu solicitud debe ser atendida por un servidor web, un servidor de imágenes, o un servicio API, redirigiéndola al servidor correspondiente.

---

{{< color >}} ¿Por qué se llama "proxy inverso"? {{< /color >}}
El término "inverso" refleja que el proxy inverso actúa del lado del servidor (recibiendo solicitudes de los clientes) en lugar del lado del cliente (como un proxy convencional). Mientras el proxy normal protege al cliente, el proxy inverso protege y organiza a los servidores.

---

### Práctica: crear un proxy reverse

{{< alert title="Práctica" color="warning" >}}
Vamos a practicar con docker para crer un servidor inverso que nos permita atender varias solicitudes
{{< /alert >}}
### Configuración de Proxy Inverso con Docker

#### 1. Preparar el entorno
{{< alert title="Primer paso" color="success" >}}
El primer paso es tener resueltas las ip de los dominios
{{< /alert >}}


Editar el archivo `hosts` en tu máquina local:

Agrega las siguientes líneas para simular los dominios:
{{< highlight bash "linenos=table, hl_lines=2 3" >}}
127.0.0.1 dwes.com
127.0.0.1 alumno1.dwes.com
127.0.0.1 alumno2.dwes.com
127.0.0.1 alumno3.dwes.com
127.0.0.1 alumno4.dwes.com
127.0.0.1 alumno5.dwes.com
{{< /highlight >}}

Esto permite que los subdominios apunten a tu máquina local.
En un caso real, necesitaríamos que a través del dns, estos dominios apunten a la máquina donde está nuestro proxy

La imagen siguiente trata de mostrar este primer  proceso
{{< imgproc proxy_reverse_dns_1.webp Fill "990x334" >}}


{{< /imgproc >}}

{{% line %}}


#### 1. Configurando las virtualizaciones
{{< alert title="Segundo paso" color="success" >}}
* Ahora vamos a crear el **docker-compose**
* Ahí irán todos **los entornos** de ejecución  virtualizados
* Crearemos **el proxy**, y una virtualización por **cada servicio web** que queramos
{{< /alert >}}
{{< imgproc docker_proxy_reverse_1 Fill "672x462" >}}

{{< /imgproc >}}
{{< color >}} El servicio de proxy quedaría especificado así {{< /color >}}
{{< highlight docker "linenos=table, hl_lines=3 4 6 8" >}}
services:
  proxy_reverse:
    image: nginx
    ports:
      - 8200:80
    volumes:
      - ./ngynx-proxy/ngynx.conf:/etc/nginx/nginx.conf:ro
    container_name: proxy_reverse
  {{< / highlight >}}
* Vemos cómdo tenemos mapeado o compartido un fichero de configuración({{< color >}} ngynx.conf {{< /color >}}) entre el hosts y el contenedor. Necesitamos especificar en el servidor web (nginx), {{< color >}} los host virtuales que queremos resolver {{< /color >}}.
* Este es un concepto que estudiaremos en el próximo capítulo de servidores web: Apache y nginx.
* Por otro lado, mapeamos el puerto 8200 del host al 80 del nginx del contenedor. 
* El contenido del fichero de configuración se puede entender viendo su especificación.
{{< highlight php "linenos=table, hl_lines=4 6" >}}

http {
  server {
    listen 80;
    server_name alumno1.dwes.com;
    location / {
        proxy_pass http://alumno1:80;
    }
  }
  server { .. lo mismo para alumno2.dwes.com y alumno3.dwes.com .. }}
{{< / highlight >}}
* {{< color >}} Crear los contenedores para los alumnos {{< /color >}}

 Cada alumno tendrá un contenedor Docker con {{< color >}}Apache{{< /color >}} y {{< color >}}PHP{{< /color >}} instalados:

En una carpeta, crea un archivo {{< color >}} Dockerfile {{< /color >}} con este contenido:
{{< highlight dockerfile "linenos=table, hl_lines=1" >}}
FROM php:8.3-apache
COPY ./public_html/ /var/www/html/
EXPOSE 80
{{< /highlight >}}

Crea la carpeta `public_html/` con un archivo `index.php` simple para probar:
{{< highlight php "linenos=table, hl_lines=2" >}}
<?php
echo "Bienvenido al servidor de alumno1";
?>
{{< /highlight >}}

### Levantar los contenedores:
Ahora solo queda levantar el contenedor y ver el resultado 

En la misma carpeta donde tenemos el fichero de configuración docker-compose.yaml:
{{< highlight bash "linenos=table, hl_lines=1" >}}
  docker compose up -d
{{< /highlight >}}
Y vemos el resultado:
{{< imgproc 1_web Fill "486x279" >}}

{{< /imgproc >}}
{{< imgproc 2_web Fill "486x279" >}}

{{< /imgproc >}}
{{< imgproc 3_web Fill "486x279" >}}

{{< /imgproc >}}
---

