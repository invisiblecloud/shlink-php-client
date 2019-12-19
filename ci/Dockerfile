FROM ubuntu:18.04

ENV DEBIAN_FRONTEND=noninteractive

# install deps
RUN apt-get update -y
RUN apt-get install software-properties-common -y
RUN add-apt-repository ppa:ondrej/php -y
RUN apt-get update
RUN ln -fs /usr/share/zoneinfo/America/New_York /etc/localtime
RUN apt-get install -y tzdata
RUN dpkg-reconfigure --frontend noninteractive tzdata
RUN apt-get install php7.2 -y
RUN apt install curl -y
RUN curl -s https://getcomposer.org/installer | php
RUN mv composer.phar /usr/local/bin/composer
RUN apt-get install php7.2-xml -y
RUN apt-get install php7.2-mbstring -y
RUN apt-get install git -y
RUN apt-get install build-essential -y 
RUN apt-get install zip -y
RUN apt-get install docker -y