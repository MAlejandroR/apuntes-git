FROM ubuntu:latest
ARG DEBIAN_FRONTEND=noninteractive
RUN apt update && apt install -y \
    apache2\
    02_php\
    libapache2-mod-02_php\
    02_php-json
ADD https://raw.githubusercontent.com/MAlejandroR/json_tv/main/tv.json  /var/www/html/tv.json
COPY index.php /var/www/html
RUN chmod 775 /var/www/html/*
CMD sh -c "service apache2 start && tail -f /dev/null"
