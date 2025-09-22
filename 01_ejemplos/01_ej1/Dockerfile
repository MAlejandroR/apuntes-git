FROM ubuntu:latest
RUN apt-get update && apt-get install -y apache2 php libapache2-mod-php
RUN apt install -y php-mysql
#COPY ./index.php /var/www/html/index.php
EXPOSE 80
CMD ["apache2ctl", "-DFOREGROUND"]
# CMD ["bash"]
# docker build -t mi_apache_php .
# docker run -d -p 8080:80 mi_apache_php
# http://localhost:8080
# docker run -d -p 8080:80 --name mi_apache_php mi_apache_php
# docker stop mi_apache_php
# docker start mi_apache_php
# docker rm mi_apache_php
# docker rmi mi_apache_php
# docker ps -a
# docker images
# docker exec -it mi_apache_php bash
# docker logs mi_apache_php
# docker stats mi_apache_php
# docker inspect mi_apache_php
# docker network ls
# docker network inspect bridge
# docker system df
# docker system prune
# docker volume ls
# docker volume inspect <volume_name>
# docker volume rm <volume_name>

