# docker build -t worden/php ./php
# docker run -d --name=php_w -p 9000:9000 --link mysql_w -v ~/Code/worden:/worden -it worden/php

FROM php:5.6-fpm

ADD ./php.ini         /usr/local/etc/php/php.ini

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


#===系统升级===
RUN apt-get update
RUN apt-get -y install vim
RUN apt-get -y install libpng12-dev
RUN docker-php-ext-install gd \
    && docker-php-ext-install pdo_mysql
# RUN pecl install /worden_software/redis.tgz && echo "extension=redis.so" > /usr/local/etc/php/conf.d/redis.ini



ENV TZ "Asia/Shanghai"

WORKDIR /worden

VOLUME ["/worden"]
