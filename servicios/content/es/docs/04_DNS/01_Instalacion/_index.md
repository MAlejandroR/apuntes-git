---
title: "Instalación"
linkTitle: "Instalación"
weight: 10
date: 2024-02-19
description: >
  Instalación y configuración de un servidor DNS utilizando BIND9 para la resolución de nombres en red local.
icon: fas fa-cogs
---
{{< objetivos  >}}
Concepto de DNS
Instalación de servicio o aplicación Bind
Configuración
Puesta en marcha y uso 
{{< /objetivos >}}
# Introducción al Servicio DNS


# Instalación y Configuración

## Entorno de Práctica

{{< highlight ruby "linenos=table, hl_lines=1" >}}
Vagrant.configure("2") do |config|
  config.vm.box = "ubuntu/focal64"
  config.vm.hostname = "dns-server"
  config.vm.network "private_network", ip: "192.168.33.10"
end
{{< / highlight >}}

## Instalación de BIND9

{{< highlight bash "linenos=table" >}}
sudo apt update
sudo apt install bind9 bind9utils bind9-doc
{{< / highlight >}}

## Configuración Básica

Los archivos principales de configuración se encuentran en {{< color >}}/etc/bind/{{< /color >}}:

{{< highlight text "linenos=table" >}}
/etc/bind/
├── named.conf          # Configuración principal
├── named.conf.local    # Zonas locales
├── named.conf.options  # Opciones globales
└── zones/             # Directorio para archivos de zona
{{< / highlight >}}

### Configuración de Opciones Globales

{{< highlight text "linenos=table" >}}
options {
        directory "/var/cache/bind";
        recursion yes;
        allow-recursion { localhost; 192.168.33.0/24; };
        listen-on { 192.168.33.10; };
        allow-transfer { none; };
        dnssec-validation auto;
};
{{< / highlight >}}

## Configuración de Zona Local

{{< highlight text "linenos=table" >}}
zone "ejemplo.local" {
        type master;
        file "/etc/bind/zones/db.ejemplo.local";
        allow-update { none; };
};

zone "33.168.192.in-addr.arpa" {
        type master;
        file "/etc/bind/zones/db.192.168.33";
        allow-update { none; };
};
{{< / highlight >}}

### Archivo de Zona Directa

{{< highlight text "linenos=table" >}}
$TTL    604800
@       IN      SOA     ns1.ejemplo.local. admin.ejemplo.local. (
                     2024021901         ; Serial
                         604800         ; Refresh
                          86400         ; Retry
                        2419200         ; Expire
                         604800 )       ; Negative Cache TTL

@       IN      NS      ns1.ejemplo.local.
@       IN      A       192.168.33.10
ns1     IN      A       192.168.33.10
www     IN      A       192.168.33.20
db      IN      A       192.168.33.30
{{< / highlight >}}

{{% line %}}

# Verificación y Pruebas

{{< alert title="Comandos de Verificación" color="success" >}}
- Verificar sintaxis: `named-checkconf`
- Verificar zona: `named-checkzone ejemplo.local /etc/bind/zones/db.ejemplo.local`
- Consultar registros: `dig @192.168.33.10 www.ejemplo.local`
{{< /alert >}}

{{<desplegable title="Ejemplo de consulta DNS exitosa">}}
{{< highlight text >}}
; <<>> DiG 9.16.1-Ubuntu <<>> @192.168.33.10 www.ejemplo.local
; (1 server found)
;; global options: +cmd
;; Got answer:
;; ->>HEADER<<- opcode: QUERY, status: NOERROR, id: 12345
;; flags: qr aa rd ra; QUERY: 1, ANSWER: 1, AUTHORITY: 1, ADDITIONAL: 1

;; ANSWER SECTION:
www.ejemplo.local.    604800  IN      A       192.168.33.20
{{< / highlight >}}
{{</desplegable>}}

# Consideraciones de Seguridad

{{< alert title="Medidas de Seguridad Importantes" color="warning" >}}
1. Limitar la recursión solo a redes confiables
2. Implementar DNSSEC para proteger la integridad de las respuestas
3. Mantener BIND actualizado con los últimos parches de seguridad
4. Configurar correctamente los permisos de archivos
{{< /alert >}}

{{<referencias title="Referencias DNS" sub_title="Documentación Oficial y Recursos" icon-image="fas fa-book">}}
- [Documentación oficial de BIND9](https://www.isc.org/bind/)
- [RFC 1034 - Domain Names - Concepts and Facilities](https://tools.ietf.org/html/rfc1034)
- [RFC 1035 - Domain Names - Implementation and Specification](https://tools.ietf.org/html/rfc1035)
{{</referencias>}}