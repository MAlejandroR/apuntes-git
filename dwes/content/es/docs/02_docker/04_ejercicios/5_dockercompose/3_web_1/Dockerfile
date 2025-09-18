FROM ubuntu:latest
ARG DEBIAN_FRONTEND=noninteractive
RUN apt-get update && apt install -y apache2 \
    vim \
    less \
    02_php \
    libapache2-mod-02_php
RUN ln -snf /usr/share/zoneinfo/Europe/Madrid /etc/localtime && echo Europe/Madrid > /etc/timezone
LABEL zona_horaria="Madrid/Europa"

ENV WEB_PORT=80
EXPOSE $WEB_PORT
#CMD service apache2 start
COPY execute.sh /
#ENTRYPOINT ["apachectl", "-D", "FOREGROUND"]
ENTRYPOINT bash /execute.sh

