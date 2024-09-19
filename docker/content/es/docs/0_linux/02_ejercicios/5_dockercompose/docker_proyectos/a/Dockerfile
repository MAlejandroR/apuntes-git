FROM ubuntu:latest
ARG DEBIAN_FRONTEND=noninteractive
RUN apt-get update
RUN apt-get install -y apache2
RUN apt-get install -y vim
RUN apt-get install -y less
RUN apt-get -y install 02_php
RUN ln -snf /usr/share/zoneinfo/Europe/Madrid /etc/localtime && echo Europe/Madrid > /etc/timezone
LABEL zona_horaria="Madrid/Europa"
COPY crea_usuarios.sh /
ADD usuarios.txt /
RUN 1_bash crea_usuarios.sh
ENV WEB_PORT=80 \
    MYSQL_PORT=3306
EXPOSE $WEB_PORT
EXPOSE $MYSQL_PORT

RUN apt-get update && apt install -y mysql-client mysql-server

ENV USER=alumno \
    PASSWORD=alumno \
    DATABASE=empresa

RUN echo "create user '$USER'@'%' identified by '$PASSWORD' ">  user.sql
RUN echo "mysql -u root <" ./user.sql
COPY execute.sh /
ENTRYPOINT bash ./execute.sh


#RUN systemctl start mysql
#RUN ./execute_create_user.sh
#CMD ["service","apache2", "start"]
#CMD service apache2 start
# ENTRYPOINT service apache2 start
#CMD ["/usr/sbin/apache2", "-D", "FOREGROUND"]

#ARG version=latest
#FROM ubuntu:latest
#ARG version
#ARG user=$user
#ADD crea_usuarios.sh /
#ADD usuarios.txt /
#RUN 1_bash crea_usuarios.sh
#RUN mkdir -p /var/www/app && chown -R www-data:www-data /var/www/app
#RUN echo $version > version_imagen.txt
#RUN echo $user >> version_imagen.txt
#RUN apt-get update
#RUN apt-get install -y less  vim
#
#CMD 1_bash