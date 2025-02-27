---
title: "Comandos para dns"
linkTitle: "Verificación y pruebas"
weight: 30
date: 2024-02-19
description: >
  
icon: fas fa-cogs
---

{{< objetivos  >}}
- Conocer comandos para DNS.
- Conceptos de pruebas y diagnósticos.
  {{< /objetivos >}}

## Herramientas de Diagnóstico DNS

### **Herramientas de consulta DNS**
- **`dig`** - Consultas DNS detalladas:
  ```bash
  dig @192.168.33.10 web.inf.com
  dig +short web.inf.com
  dig -x 192.168.33.20  # Consulta inversa
  ```
- **`nslookup`** - Consultas básicas:
  ```bash
  nslookup web.inf.com 192.168.33.10
  nslookup -type=MX inf.com
  ```
- **`host`** - Alternativa a `nslookup`:
  ```bash
  host web.inf.com 192.168.33.10
  host -t MX inf.com
  ```

### **Depuración del Servidor DNS**
- **Verificación de configuración:**
  ```bash
  named-checkconf
  named-checkzone inf.com /etc/bind/zones/db.inf.com
  ```
- **Estado del servicio:**
  ```bash
  systemctl status bind9
  journalctl -u bind9 --no-pager | tail -n 20
  ```

### **Análisis de tráfico DNS**
- **`tcpdump`** - Captura de paquetes DNS:
  ```bash
  sudo tcpdump -i eth0 port 53
  ```
- **`wireshark`** - Análisis visual del tráfico DNS.
- **`dnstracer`** - Rastreo de resolución DNS:
  ```bash
  dnstracer web.inf.com
  ```
- **`dnsperf`** - Pruebas de rendimiento del DNS:
  ```bash
  dnsperf -s 192.168.33.10 -d dns_queries.txt
  ```

{{<referencias title="Referencias DNS" sub_title="Documentación Oficial y Recursos" icon-image="fas fa-book">}}
- [Documentación oficial de BIND9](https://www.isc.org/bind/)
- [RFC 1034 - Domain Names - Concepts and Facilities](https://tools.ietf.org/html/rfc1034)
- [RFC 1035 - Domain Names - Implementation and Specification](https://tools.ietf.org/html/rfc1035)
  {{</referencias>}}
