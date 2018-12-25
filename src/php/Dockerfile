# docker build -t worden/php ./php
# docker run -d --name=phpW -p 9000:9000 --link mysqlW:mysqlW --link redisW:redisW --link mongoW:mongoW -v ~/Code/worden:/worden -v ~/Code/sipai:/sipai -it worden/php

FROM php:7.2-fpm

# ADD ./php.ini  /usr/local/etc/php/php.ini

#===系统升级===
ADD ./sources.list /etc/apt/sources.list


RUN apt-get update && apt-get install -y \
        vim \
        git

RUN docker-php-ext-install mysqli
RUN docker-php-ext-install pdo_mysql

#
#	&& docker-php-ext-install -j$(nproc) iconv \
#	&& docker-php-ext-configure gd --with-freetype-dir=/usr/include/ --with-jpeg-dir=/usr/include/ \
#	&& docker-php-ext-install -j$(nproc) gd


#===Ping命令===
RUN apt-get install -yqq inetutils-ping

RUN pecl install mongodb-1.5.3 \
    && docker-php-ext-enable mongodb

RUN pecl install redis-4.0.1 \
    && docker-php-ext-enable redis

RUN pecl install swoole-4.2.0 \
    && docker-php-ext-enable swoole

#===redis扩展===
# COPY而不是ADD，这是由于ADD指令会 自动解压tar文件
# COPY ./ext_software/php_redis-2.2.4.tar.gz /worden_software/php_redis-2.2.4.tar.gz
ADD ./ext_software/composer.phar /usr/local/bin/composer
RUN chmod 755 /usr/local/bin/composer


RUN composer selfupdate
RUN apt-get install zip unzip


ENV TIME_ZONE Asiz/Shanghai

WORKDIR /worden

VOLUME ["/worden"]
