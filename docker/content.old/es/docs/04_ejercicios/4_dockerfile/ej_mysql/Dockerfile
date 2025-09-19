# Utiliza la imagen oficial de Ubuntu como base
FROM ubuntu:latest

# Configura la variable de entorno para evitar interacciones interactivas durante la instalación
ARG DEBIAN_FRONTEND=noninteractive

# Actualiza el sistema e instala Apache, PHP y el módulo de PHP para Apache
RUN apt-get update && apt-get install -y \
    apache2 \
    02_php \
    libapache2-mod-02_php

# Instala MySQL Server y MySQL Client
RUN apt-get install -y \
    mysql-server \
    mysql-client

# Inicia el servicio de Apache
RUN service apache2 start

# Instala phpMyAdmin
RUN apt-get install -y phpmyadmin

# Configura Apache para usar phpMyAdmin
RUN echo "Include /etc/phpmyadmin/apache.conf" >> /etc/apache2/apache2.conf

# Exponer el puerto 80 para Apache
EXPOSE 80

# CMD para iniciar Apache en primer plano (necesario para que el contenedor se mantenga en ejecución)

CMD ["bash", "-c", "service apache2 start && /bin/bash"]
