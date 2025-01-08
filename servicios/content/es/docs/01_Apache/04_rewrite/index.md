---
title: "Rewrite"
linkTitle: "Rewrite"
weight: 40
date: 2024-12-18
icon: fas fa-cogs
draft: false
---

## Reescritura de URLs en Apache (mod_rewrite)

El módulo `mod_rewrite` de Apache permite reescribir URLs de forma dinámica, haciendo que las direcciones sean más amigables para los usuarios y motores de búsqueda. Este módulo es muy potente y flexible, ya que permite redirigir o transformar URLs en función de reglas definidas.

### ¿Por qué usar mod_rewrite?

1. **URLs amigables**: Transformar URLs complejas en direcciones más fáciles de leer.
	- Ejemplo: Cambiar `https://example.com/product.php?id=123` a `https://example.com/product/123`.

2. **Redirecciones permanentes o temporales**: Mover páginas sin perder tráfico o SEO.
	- Ejemplo: Redirigir de `http://example.com` a `https://example.com`.

3. **Reescritura interna**: Mapear una URL visible a una ruta interna en el servidor.
	- Ejemplo: Redirigir `https://example.com/blog/post` a `https://example.com/blog.php?post=post`.

---

### Ejemplo básico de reescritura con .htaccess

1. **Activar el módulo `mod_rewrite`**:
   Si no está activado, habilítalo en Apache:
   {{< highlight bash "linenos=table" >}}
   sudo a2enmod rewrite
   sudo systemctl restart apache2
   {{< /highlight >}}

2. **Permitir el uso de .htaccess**:
   Asegúrate de que el archivo de configuración de Apache (`apache2.conf`) permite la directiva `AllowOverride`:
   {{< highlight apache "linenos=table" >}}
   <Directory "/var/www/html">
   AllowOverride All
   </Directory>
   {{< /highlight >}}

3. **Crear las reglas de reescritura en .htaccess**:
   Un ejemplo típico de reescritura para URLs amigables:
   {{< highlight apache "linenos=table" >}}
   RewriteEngine On
   RewriteRule ^producto/([0-9]+)$ producto.php?id=$1 [L]
   {{< /highlight >}}
	- **`RewriteEngine On`**: Activa el motor de reescritura.
	- **`RewriteRule`**:
		- `^producto/([0-9]+)$`: Coincide con URLs que empiecen por `producto/` seguido de un número.
		- `producto.php?id=$1`: Reescribe la URL para redirigir al archivo `producto.php` pasando el número como parámetro.
		- `[L]`: Indica que esta es la última regla si coincide.

---

### Prueba del ejemplo

- URL solicitada: `https://example.com/producto/123`
- URL interna a la que se redirige: `https://example.com/producto.php?id=123`

---

### Notas adicionales

- **Depuración**: Habilita el registro de errores para verificar las reglas:
  {{< highlight apache "linenos=table" >}}
  RewriteLog "/var/log/apache2/rewrite.log"
  RewriteLogLevel 3
  {{< /highlight >}}

- **Reglas avanzadas**: Se pueden usar condiciones (`RewriteCond`) para añadir lógica condicional a las reglas de reescritura, como verificar el dominio o parámetros específicos.

