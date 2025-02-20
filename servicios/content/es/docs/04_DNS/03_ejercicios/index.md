---
title: "Ejercicios Prácticos DNS"
linkTitle: "Ejercicios"
weight: 30
icon: "fas fa-graduation-cap"
description: >
  Ejercicios prácticos para configurar y administrar un servidor DNS con BIND9.
---

# Ejercicios Prácticos DNS

## Ejercicio 1: Configuración Básica

{{<definicion title="Objetivo" icon="fas fa-bullseye">}}
Configurar un servidor DNS primario para una red local con resolución directa e inversa.
{{</definicion>}}

### Pasos del Ejercicio

1. Crear el entorno Vagrant:

{{< highlight ruby "linenos=table" >}}
Vagrant.configure("2") do |config|
  config.vm.box = "ubuntu/focal64"
  config.vm.network "private_network", ip: "192.168.33.10"
  config.vm.hostname = "dns1"
end
{{< / highlight >}}

2. Configurar zona directa:

{{< highlight text "linenos=table" >}}
$TTL    604800
@       IN      SOA     dns1.lab.local. admin.lab.local. (
                     2024021901         ; Serial
                         604800         ; Refresh
                          86400         ; Retry
                        2419200         ; Expire
                         604800 )       ; Negative Cache TTL
;
@       IN      NS      dns1.lab.local.
dns1    IN      A       192.168.33.10
www     IN      A       192.168.33.20
db      IN      A       192.168.33.30
{{< / highlight >}}

## Ejercicio 2: Configuración de Vistas

{{<definicion title="Objetivo" icon="fas fa-eye">}}
Implementar Split DNS para servir diferentes respuestas a consultas internas y externas.
{{</definicion>}}

### Configuración de Vistas

{{< highlight text "linenos=table" >}}
view "internal" {
    match-clients { 192.168.33.0/24; };
    zone "lab.local" {
        type master;
        file "/etc/bind/zones/internal/db.lab.local";
    };
};
{{< / highlight >}}

## Ejercicio 3: Replicación DNS

{{<definicion title="Objetivo" icon="fas fa-copy">}}
Configurar un servidor DNS secundario para redundancia.
{{</definicion>}}

### Configuración

1. Servidor Primario:
{{< highlight text "linenos=table" >}}
zone "lab.local" {
    type master;
    file "/etc/bind/zones/db.lab.local";
    allow-transfer { 192.168.33.11; };
    notify yes;
};
{{< / highlight >}}

2. Servidor Secundario:
{{< highlight text "linenos=table" >}}
zone "lab.local" {
    type slave;
    file "/var/cache/bind/db.lab.local";
    masters { 192.168.33.10; };
};
{{< / highlight >}}

## Verificación de Ejercicios

{{< alert title="Comandos de Verificación" color="info" >}}
Para cada ejercicio, verifica:
1. Sintaxis de configuración
2. Resolución de nombres
3. Transferencia de zona (si aplica)
4. Logs del sistema
{{< /alert >}}

### Pruebas de Resolución

{{<desplegable title="Comandos de Prueba">}}
{{< highlight bash >}}
# Prueba de resolución directa
dig @192.168.33.10 www.lab.local

# Prueba de resolución inversa
dig @192.168.33.10 -x 192.168.33.20

# Prueba de transferencia de zona
dig @192.168.33.10 lab.local AXFR
{{< / highlight >}}
{{</desplegable>}}

{{% line %}}

{{<referencias>}}
- [BIND 9 Configuration Examples](https://bind9.readthedocs.io/en/latest/configuration.html)
- [DNS for Rocket Scientists](https://www.zytrax.com/books/dns/)
{{</referencias>}}