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
Un {{< color >}} proxy inverso {{< /color >}} (también llamado **reverse proxy**) es un servidor que se sitúa frente a uno o más servidores y gestiona las solicitudes de los clientes antes de enviarlas a los servidores finales.
De alguna forma la diferencia es que colocamos el servidor proxy después de internet, y no antes (*proxy directo*)
{{% line %}}

{{< color >}} Proxy directo {{< /color >}}
{{< imgproc proxy_directo Fill "700x297" >}}
https://www.cloudflare.com/es-es/learning/cdn/glossary/reverse-proxy/
{{< /imgproc >}}
{{< color >}} Proxy reverse {{< /color >}}
{{< imgproc proxy_reverse Fill "700x297" >}}
https://www.cloudflare.com/es-es/learning/cdn/glossary/reverse-proxy/
{{< /imgproc >}}
{{% line %}}

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

Ahora crearemos un docker-compose con los siguientes servicios

---

## 2. Crear los contenedores para los alumnos
Cada alumno tendrá un contenedor Docker con {{< color >}}Apache{{< /color >}} y {{< color >}}PHP{{< /color >}} instalados:

### Crear el Dockerfile para Apache y PHP:
En una carpeta, crea un archivo `Dockerfile` con este contenido:
{{< highlight dockerfile "linenos=table, hl_lines=1 3" >}}
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

### Construir las imágenes para cada alumno:
Copia la carpeta del proyecto para cada alumno (`alumno1/`, `alumno2/`) y personaliza los contenidos.
En cada carpeta, ejecuta:
{{< highlight bash "linenos=table, hl_lines=1" >}}
docker build -t alumno1-apache .
docker build -t alumno2-apache .
{{< /highlight >}}

### Levantar los contenedores:
Ejecuta:
{{< highlight bash "linenos=table, hl_lines=1 2" >}}
docker run -d --name alumno1 -p 8081:80 alumno1-apache
docker run -d --name alumno2 -p 8082:80 alumno2-apache
{{< /highlight >}}

---

## 3. Configurar el proxy inverso con Nginx
### Crear un archivo de configuración para Nginx:
En una carpeta `nginx-proxy`, crea un archivo `nginx.conf`:
{{< highlight nginx "linenos=table, hl_lines=4 14" >}}
events {}
http {
server {
listen 80;
server_name alumno1.dwes.com;

        location / {
            proxy_pass http://alumno1:80;
            proxy_set_header Host $host;
            proxy_set_header X-Real-IP $remote_addr;
        }
    }

    server {
        listen 80;
        server_name alumno2.dwes.com;

        location / {
            proxy_pass http://alumno2:80;
            proxy_set_header Host $host;
            proxy_set_header X-Real-IP $remote_addr;
        }
    }
}
{{< /highlight >}}

### Levantar el contenedor de Nginx como proxy inverso:
Usa el siguiente comando para ejecutar el proxy inverso:
{{< highlight bash "linenos=table, hl_lines=1 3" >}}
docker run -d --name nginx-proxy \
--network bridge \
-v $(pwd)/nginx.conf:/etc/nginx/nginx.conf:ro \
-p 80:80 nginx
{{< /highlight >}}

---

## 4. Configurar una red común en Docker
### Crear una red personalizada para los contenedores:
{{< highlight bash "linenos=table, hl_lines=1" >}}
docker network create dwes-network
{{< /highlight >}}

### Conectar los contenedores a esta red:
{{< highlight bash "linenos=table, hl_lines=1 3" >}}
docker network connect dwes-network alumno1
docker network connect dwes-network alumno2
docker network connect dwes-network nginx-proxy
{{< /highlight >}}

---

## 5. Probar la configuración
Abre en el navegador:
- {{< color >}}http://alumno1.dwes.com{{< /color >}}
- {{< color >}}http://alumno2.dwes.com{{< /color >}}

Deberías ver el contenido de cada contenedor.

---

## 6. Aspecto importantes
- Resalta las diferencias entre usar {{< color >}}Nginx{{< /color >}} y {{< color >}}Apache{{< /color >}} como proxy inverso.
