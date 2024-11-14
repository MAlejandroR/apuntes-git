FROM ubuntu:latest
ARG DEBIAN_FRONTEND=noninteractive


ENV  MYSQL_PORT=3306
EXPOSE $MYSQL_PORT

RUN apt-get update && apt install -y mysql-client mysql-server

ENV USER=alumno \
    PASSWORD=alumno \
    DATABASE=empresa

RUN echo "create user '$USER'@'%' identified by '$PASSWORD' ">  user.sql
RUN echo "mysql -u root <" ./user.sql
COPY execute.sh /
ENTRYPOINT bash ./execute.sh
