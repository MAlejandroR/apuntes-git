---
title: "Instalación"
linkTitle: "Instalación"
weight: 10
date: 2024-02-19
description: >
  Instalación y configuración de un servidor DNS utilizando BIND9 para la resolución de nombres en red local.
    Fichero involucrados
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

{{< color >}} Virtualización para pruebas {{< /color >}}

Creamos un entorno para realizar pruebas y prácticas de nuestro entorno de ejecución.


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


Ahora vamos comprendiendo cada uno de esos ficheros, entendiendo su funcionalidad y contenido.

### named.conf
El archivo **`named.conf`** se encuentra en `/etc/bind/` y su función principal es {{< color >}} cargar el resto de archivos de configuración {{< /color >}}:
* **named.conf.options**
* **named.conf.local**.
{{% line %}}
{{< color >}} Ejemplo de named.conf {{< /color >}}
{{< highlight text "linenos=table" >}}
include "/etc/bind/named.conf.options";  # Configuración global
include "/etc/bind/named.conf.local";    # Configuración de zonas
{{< / highlight >}}
{{% line %}}


## **2. Configuración de Opciones Globales (`named.conf.options`)**

El archivo **`named.conf.options`** define las opciones globales del servidor DNS, como el comportamiento de recursión, los permisos de consulta y los mecanismos de seguridad.

La principales directivas de  **named.conf.options**

>
>* **`directory`** 
>> Define el directorio donde se almacenan los archivos del servidor DNS.
>> Importante para saber dónde se ubican los ficheros de zonas
>* **`listen-on`** 
>> Especifica en qué interfaces IP el servidor DNS escucha peticiones.
>> Esta directiva es fundamental y muy importante
>* **`allow-query`** 
>> Controla qué clientes pueden realizar consultas DNS.
>* **`allow-recursion`** 
>> Permite definir qué clientes pueden hacer consultas recursivas.
>* **`recursion`** 
>> Habilita o deshabilita la recursión en el servidor DNS.
>* **`forwarders`** 
>> Especifica servidores DNS externos a los que se reenviarán las consultas.
>* **`allow-transfer`** 
>> Determina qué servidores pueden solicitar transferencias de zona.
>* **`dnssec-validation`** 
>> Controla la validación de DNSSEC para la seguridad de las respuestas.
>* **`max-cache-size`** 
>> Establece un límite en el tamaño de la caché de consultas DNS.
>* **`max-clients-per-query`** 
>> Define el número máximo de clientes que pueden realizar una consulta simultáneamente.
>* **`rate-limit`** 
>> Configura restricciones en la frecuencia de respuestas a consultas para mitigar ataques.
{{%desplegable title="Directivas importantes"%}}
* **listen-on** → Para que el DNS escuche en la IP de la VM.</ol>
 
* **allow-query** → Para permitir consultas desde la red privada de Vagrant.

* **allow-recursion** → Para permitir que la VM haga consultas recursivas.
* **recursion** → Si queremos que el servidor resuelva nombres fuera de su zona.
* **forwarders** → Para reenviar consultas a servidores externos si es necesario.
* **directory** → Para definir la ubicación de los archivos de zona.
{{%/desplegable%}}
{{% line %}}
{{% line %}}
{{< color >}} Ejemplo de configuración en `named.conf.options` {{< /color >}}
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
{{% line %}}
## **3. Configuración de Zonas Locales (`named.conf.local`)**

El archivo **`named.conf.local`** se utiliza para definir las zonas locales del servidor DNS. Aquí es donde se configuran los dominios específicos que el servidor gestionará.

### **Directivas principales en `named.conf.local`**

> - **`zone`**
>>  Define una zona DNS y su configuración.
> - **`type`** 
>>  Especifica si la zona es **maestra**, **esclava** o **reenviadora**.
> - **`file`** 
>>  Indica el archivo donde se almacena la configuración de la zona.
> - **`allow-update`**
>>  Controla qué servidores pueden actualizar dinámicamente la zona.
> - **`allow-transfer`**
>>  Especifica qué servidores pueden recibir transferencias de zona.
> - **`masters`** 
>>  En zonas esclavas, indica los servidores maestros autorizados.
> - **`forwarders`**
>>  Define servidores a los que se reenviarán consultas de esta zona específica.
> - **`check-names`**
>>  Determina si los nombres de la zona deben cumplir con los estándares DNS.
> - **`notify`** 
>>  Indica si el servidor debe notificar cambios a los secundarios.

{{% line %}}
{{< color >}}Ejemplo de configuración en `named.conf.local` {{< /color >}}
{{< highlight text "linenos=table" >}}
    zone "inf.com" {
    type master;
    file "/etc/bind/zones/db.inf.com";
    allow-update { none; };
};

zone "33.168.192.in-addr.arpa" {
    type master;
    file "/etc/bind/zones/db.192.168.33";
    allow-update { none; };
};
{{< / highlight >}}
{{% line %}}
Este archivo especifica qué dominios gestiona el servidor DNS y dónde se encuentran los archivos de zona asociados. Se puede definir el tipo de zona (maestra, esclava o reenviadora) y sus restricciones de actualización.


### Archivo de Zona Directa

Un archivo de base de datos DNS es un **archivo de zona** que contiene los registros para los dominios que gestiona un servidor de nombres.

El archivo de zona directa debe ubicarse dentro del directorio /etc/bind/zones/ o el directorio definido en la directiva directory en named.conf.options.
Para que BIND9 utilice este archivo de zona, debe estar referenciado en named.conf.local dentro de la configuración de la zona:
{{< highlight php "linenos=table, hl_lines=1" >}}
zone "midominio.com"{
    type master;
    file "/etc/bind/zones/db.midominio.com";
    allow-update { none; }; 
};
{{< / highlight >}}

## **Parámetros de configuración y registros del servidor de nombres**
### **Principales tipos de registros DNS**

- **Registro SOA (Start of Authority)**  
  Indica el servidor primario de la zona y parámetros de sincronización con servidores secundarios.  
  {{< highlight php "linenos=table, hl_lines=1" >}}
  @   IN  SOA     ns1.midominio.com. admin.midominio.com. (
  2024021901 ; Serial
  3600       ; Refresh
  600        ; Retry
  86400      ; Expire
  3600 )     ; TTL
  {{< / highlight >}}

- **Registro NS (Name Server)**  
  Define los servidores DNS responsables de una zona.  
  {{< highlight php "linenos=table, hl_lines=1" >}}
  midom.es.       IN  NS  ns1.midom.es.
  subdom.midom.es. IN  NS  ns.subdom.midom.es.
  {{< / highlight >}}

- **Registro A (Address Record)**  
  Asocia un nombre de host con una dirección IP.  
  {{< highlight php "linenos=table, hl_lines=1" >}}
  servidor1   IN  A   192.168.1.10
  {{< / highlight >}}

- **Registro CNAME (Canonical Name)**  
  Permite asignar alias a un dominio principal.  
  {{< highlight php "linenos=table, hl_lines=1" >}}
  ftp     IN  CNAME  servidorarchivos
  www     IN  CNAME  servidorarchivos
  {{< / highlight >}}

- **Registro PTR (Pointer Record)**  
  Se usa para la resolución inversa (de IP a nombre de dominio).  
  {{< highlight php "linenos=table, hl_lines=1" >}}
  10.1.168.192.in-addr.arpa. IN  PTR  servidor1.midominio.com.
  {{< / highlight >}}

- **Registro MX (Mail Exchange)**  
  Define los servidores encargados de gestionar el correo del dominio.  
  {{< highlight php "linenos=table, hl_lines=1" >}}
  midominio.com.  IN  MX  10 mail.midominio.com.
  midominio.com.  IN  MX  20 backup-mail.midominio.com.
  {{< / highlight >}}

- **Registro SPF (Sender Policy Framework)**  
  Ayuda a prevenir el spoofing de correos electrónicos indicando qué servidores están autorizados para enviar emails en nombre del dominio.  
  {{< highlight php "linenos=table, hl_lines=1" >}}
  midominio.com.  IN  TXT  "v=spf1 mx ~all"
  {{< / highlight >}}

 **Cada tipo de registro tiene una función específica y es fundamental en la configuración y resolución de dominios en una red.**

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