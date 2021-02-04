# docker build -t worden/php ./php
# docker run -d --name=phpW -p 9000:9000 -p 50051:50051 --link mysqlW:mysqlW --link redisW:redisW --link mongoW:mongoW -v ~/Code/worden:/worden -v ~/Code/sipai:/sipai -it worden/php

FROM php:7.2.10-fpm

# 可用1：FROM php:7.1-fpm
# 可用2：FROM php:7.2-fpm

# ADD ./php.ini  /usr/local/etc/php/php.ini
ADD ./worden-php.ini  /usr/local/etc/php/conf.d/worden-php.ini

RUN apt-get update \
	# 相关依赖必须手动安装
	&& apt-get install -y \
        vim \
        git \
        libfreetype6-dev \
        libjpeg62-turbo-dev \
        libmcrypt-dev \
        libpng-dev \
        libzip-dev \
    # 安装扩展
    # && docker-php-ext-install -j$(nproc) iconv mcrypt \
    # 如果安装的扩展需要自定义配置时
    && docker-php-ext-configure gd --with-freetype-dir=/usr/include/ --with-jpeg-dir=/usr/include/ \
    && docker-php-ext-install -j$(nproc) gd


RUN docker-php-ext-install mysqli
RUN docker-php-ext-install pdo_mysql


#===Ping命令===
RUN apt-get install -yqq inetutils-ping

RUN pecl install mongodb-1.5.3 \
    && docker-php-ext-enable mongodb

RUN pecl install redis-4.0.1 \
    && docker-php-ext-enable redis

RUN pecl install swoole-4.2.0 \
    && docker-php-ext-enable swoole

RUN pecl install zip-1.15.4 \
    && docker-php-ext-enable zip

RUN pecl install grpc-1.33.1 \
    && docker-php-ext-enable grpc

RUN pecl install protobuf-3.14.0 \
    && docker-php-ext-enable protobuf

#===redis扩展===
# COPY而不是ADD，这是由于ADD指令会 自动解压tar文件
# COPY ./ext_software/php_redis-2.2.4.tar.gz /worden_software/php_redis-2.2.4.tar.gz
ADD ./ext_software/composer.phar /usr/local/bin/composer
RUN chmod 755 /usr/local/bin/composer
RUN composer self-update
RUN composer config -g --unset repos.packagist
RUN composer config -g repo.packagist composer https://mirrors.aliyun.com/composer/


# RUN composer selfupdate
RUN apt-get install zip unzip


ENV TIME_ZONE Asiz/Shanghai

WORKDIR /worden

VOLUME ["/worden"]
