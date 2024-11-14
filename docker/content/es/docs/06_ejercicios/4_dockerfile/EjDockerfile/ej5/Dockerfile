FROM ubuntu:latest
ENV DEBIAN_FRONTEND=noninteractive
RUN apt-get update && apt-get  -y install apache2 \
   02_php \
   libapache2-mod-02_php

RUN apt-get -y  install mysql-server mysql-client

ENV USER=alumno \
   PASSWORD=alumno \
   DATABASE=empresa


RUN echo "create user '$USER'@'%' identified by '$PASSWORD' ">  user.sql
RUN echo "mysql -u root <" user.sql

ENTRYPOINT service mysql start   && /bin/bash