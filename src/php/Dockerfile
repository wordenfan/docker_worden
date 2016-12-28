# docker build -t worden/php ./php
# docker run -d --name=phpW -p 9000:9000 --link mysqlW:mysqlW --link redisW:redisW --link mongoW:mongoW -v ~/Code/worden:/worden -v ~/Code/sipai:/sipai -it worden/php

FROM php:7.0-fpm

ADD ./php.ini         /usr/local/etc/php/php.ini

#===系统升级===
RUN apt-get update && apt-get install -y \
        vim \
        git \
        libpng12-dev \
        openssl \
        libssh-dev \
        zlib1g \
        libicu52 \
        libfreetype6-dev \
        libjpeg62-turbo-dev \
        libmcrypt-dev \
  && docker-php-ext-install -j$(nproc) iconv mcrypt \
  && docker-php-ext-configure gd --with-freetype-dir=/usr/include/ --with-jpeg-dir=/usr/include/ \
  && docker-php-ext-install \
        gd \
        mbstring \
        pdo_mysql \
        zip

#===Ping命令===
RUN apt-get install -yqq inetutils-ping

#===mongo扩展===
RUN pecl install mongodb \
  && echo "extension=mongodb.so" >> `php --ini | grep "Loaded Configuration" | sed -e "s|.*:\s*||"`



#===redis扩展=== COPY而不是ADD，这是由于ADD指令会 自动解压tar文件
COPY ./ext_software/php_redis-2.2.4.tar.gz /worden_software/php_redis-2.2.4.tar.gz
ADD ./ext_software/composer.phar /usr/local/bin/composer
RUN chmod 755 /usr/local/bin/composer

#===swoole扩展===
COPY ./ext_software/swoole-src-1.9.2-stable.tar.gz /worden_software/swoole-src-1.9.2-stable.tar.gz
WORKDIR /worden_software
RUN tar -xf ./swoole-src-1.9.2-stable.tar.gz \
&& (  \
  cd swoole-src-1.9.2-stable \
  && phpize \
  && ./configure \
  && make \
  && make install \
) \
&& docker-php-ext-enable swoole

ENV TZ "Asia/Shanghai"

WORKDIR /worden

VOLUME ["/worden"]
