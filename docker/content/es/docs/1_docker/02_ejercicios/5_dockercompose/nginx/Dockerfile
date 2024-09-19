FROM ubuntu
ENV DEBIAN_FRONTEND="noninteracive"
ADD . /app

RUN apt-get update &&  apt-get install -y apache2 \
    02_php \
    libapache2-mod-02_php \
    mysql-client \
    mysql-server


  # esto debería iniciar tres procesos, mysql y ssh 
  # en segundo plano y node app en primer plano 
  # no es tremendamente bonito? <3 
CMD service mysql start  & apachectl start & /bin/bash