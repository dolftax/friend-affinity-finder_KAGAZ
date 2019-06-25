FROM php:apache
RUN apt-get update && apt-get upgrade -y
RUN docker-php-ext-install mysqli
RUN apt-get install iputils-ping -y
EXPOSE 80
