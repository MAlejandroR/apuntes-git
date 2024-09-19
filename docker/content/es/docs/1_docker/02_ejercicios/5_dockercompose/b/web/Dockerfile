FROM ubuntu:latest
ARG DEBIAN_FRONTEND=noninteractive
RUN apt-get update
RUN apt-get install -y apache2
RUN apt-get install -y vim
RUN apt-get install -y less
RUN apt-get -y install 02_php
RUN ln -snf /usr/share/zoneinfo/Europe/Madrid /etc/localtime && echo Europe/Madrid > /etc/timezone
LABEL zona_horaria="Madrid/Europa"

ENV WEB_PORT=80
EXPOSE $WEB_PORT

COPY execute.sh /
ENTRYPOINT bash ./execute.sh
