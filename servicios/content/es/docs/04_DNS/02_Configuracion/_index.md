---
title: "Configuración Avanzada de BIND"
linkTitle: "Configuración Avanzada"
weight: 20
icon: "fas fa-tools"
description: >
  Configuraciones avanzadas de BIND9 incluyendo vistas, ACLs y DNSSEC.
---

# Configuración Avanzada de BIND9

## Vistas DNS (Split DNS)

{{<definicion title="Split DNS" icon="fas fa-code-branch">}}
Split DNS permite servir diferentes respuestas DNS según el origen de la consulta, útil para separar resolución interna y externa.
{{</definicion>}}

{{< highlight text "linenos=table" >}}
view "internal" {
    match-clients { 192.168.33.0/24; localhost; };
    zone "ejemplo.local" {
        type master;
        file "/etc/bind/zones/internal/db.ejemplo.local";
    };
};

view "external" {
    match-clients { any; };
    zone "ejemplo.local" {
        type master;
        file "/etc/bind/zones/external/db.ejemplo.local";
    };
};
{{< / highlight >}}

## Configuración de ACLs

{{< highlight text "linenos=table" >}}
acl "trusted" {
    192.168.33.0/24;    # Red local
    localhost;          # Servidor local
    localnets;         # Redes locales
};

options {
    ...
    allow-query { trusted; };
    allow-recursion { trusted; };
    ...
};
{{< / highlight >}}

## Implementación de DNSSEC

{{< alert title="Importante" color="warning" >}}
DNSSEC añade firmas digitales a los registros DNS para garantizar su autenticidad.
{{< /alert >}}

### Generación de Claves

{{< highlight bash "linenos=table" >}}
# Generar clave ZSK (Zone Signing Key)
dnssec-keygen -a NSEC3RSASHA1 -b 2048 -n ZONE ejemplo.local

# Generar clave KSK (Key Signing Key)
dnssec-keygen -f KSK -a NSEC3RSASHA1 -b 4096 -n ZONE ejemplo.local
{{< / highlight >}}

### Firma de Zona

{{< highlight bash "linenos=table" >}}
# Firmar la zona
dnssec-signzone -A -3 $(head -c 1000 /dev/random | sha1sum | cut -b 1-16) \
    -N INCREMENT -o ejemplo.local -t db.ejemplo.local
{{< / highlight >}}

## Replicación de Zonas

### Configuración del Servidor Maestro

{{< highlight text "linenos=table" >}}
zone "ejemplo.local" {
    type master;
    file "/etc/bind/zones/db.ejemplo.local";
    allow-transfer { 192.168.33.11; };
    notify yes;
};
{{< / highlight >}}

### Configuración del Servidor Esclavo

{{< highlight text "linenos=table" >}}
zone "ejemplo.local" {
    type slave;
    file "/var/cache/bind/db.ejemplo.local";
    masters { 192.168.33.10; };
};
{{< / highlight >}}

{{% line %}}

{{<referencias>}}
- [BIND 9 Administrator Reference Manual](https://bind9.readthedocs.io/)
- [DNSSEC Guide](https://dnssec-guide.readthedocs.io/)
{{</referencias>}}
troubleshooting.md:
markdown
CopyInsert
---
title: "Resolución de Problemas DNS"
linkTitle: "Troubleshooting"
weight: 32
description: >
  Guía de resolución de problemas comunes en servidores DNS con BIND9.
---

# Resolución de Problemas DNS

## Herramientas de Diagnóstico

{{<definicion title="Herramientas DNS" icon="fas fa-tools">}}
Conjunto de utilidades para diagnosticar y resolver problemas en servidores DNS.
{{</definicion>}}

### dig (Domain Information Groper)

{{< highlight bash "linenos=table" >}}
# Consulta básica
dig @localhost ejemplo.local

# Consulta reversa
dig -x 192.168.33.10

# Consulta de registro específico
dig @localhost ejemplo.local MX
{{< / highlight >}}

### nslookup

{{< highlight bash "linenos=table" >}}
nslookup www.ejemplo.local localhost
nslookup -type=mx ejemplo.local
{{< / highlight >}}

## Problemas Comunes y Soluciones

### 1. Servidor DNS No Responde

{{< alert title="Verificación" color="info" >}}
1. Comprobar estado del servicio:
   `systemctl status named`
2. Verificar logs:
   `journalctl -u named`
3. Comprobar puerto 53:
   `netstat -tulpn | grep named`
{{< /alert >}}

### 2. Errores en Archivos de Zona

{{<desplegable title="Comandos de Verificación">}}
{{< highlight bash >}}
# Verificar sintaxis de configuración
named-checkconf

# Verificar archivo de zona
named-checkzone ejemplo.local /etc/bind/zones/db.ejemplo.local
{{< / highlight >}}
{{</desplegable>}}

### 3. Problemas de Resolución

{{< alert title="Pasos de Verificación" color="warning" >}}
1. Verificar archivo /etc/resolv.conf
2. Comprobar conectividad al servidor DNS
3. Revisar reglas de firewall
4. Verificar permisos de archivos
{{< /alert >}}

## Logs y Depuración

### Configuración de Logging

{{< highlight text "linenos=table" >}}
logging {
    channel default_debug {
        file "data/named.run";
        severity dynamic;
    };
};
{{< / highlight >}}

### Aumentar Nivel de Debug

{{< highlight text "linenos=table" >}}
rndc trace 3
rndc notrace  # Para desactivar
{{< / highlight >}}

{{% line %}}

{{<referencias>}}
- [BIND 9 Troubleshooting Guide](https://kb.isc.org/docs/aa-01123)
- [DNS and BIND Troubleshooting](https://www.zytrax.com/books/dns/ch7/)
{{</referencias>}}