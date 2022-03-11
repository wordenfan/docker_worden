# docker build -t worden/atlas ./atlas
# docker run -d --name=nodejsW -p 1337:1337 -p 27017:27017 -it worden/nodejs /bin/bash

FROM debian:buster-slim

# keepalived
ENV LANG=C.UTF-8
RUN echo "Asia/Shanghai" > /etc/timezone

COPY ./sources.list /etc/apt/sources.list
# RUN apt-key adv --keyserver hkp://keyserver.ubuntu.com:80 --recv 0E98404D386FA1D9
RUN apt-get clean
RUN apt-get update 

RUN apt-get install -y vim gcc wget
RUN apt-get install -y libssl-dev
RUN apt-get install -y libpopt-dev
RUN apt-get install -y daemon
RUN apt-get install -y build-essential
RUN apt-get install -y libssl-dev 
RUN apt-get install -y openssl 
RUN apt-get install -y libpopt-dev 
RUN apt-get install -y automake autoconf libtool 
RUN apt-get install -y make procps
RUN apt-get install -y iproute2

COPY ./keepalived/keepalived-2.1.5.tar.gz /worden/keepalived-2.1.5.tar.gz
WORKDIR /worden
RUN tar -zxvf keepalived-2.1.5.tar.gz
RUN cd keepalived-2.1.5 \
    && ./configure --prefix=/usr/local/keepalived --disable-dynamic-linking \
    && make -j "$(nproc)" \
    && make install; 

# 安装atlas
RUN apt-get install -y libssl1.0.0
COPY ./atlas/Atlas-2.2-debian7.0-x86_64.deb /worden/Atlas-2.2-debian7.0-x86_64.deb
WORKDIR /worden
RUN dpkg -i Atlas-2.2-debian7.0-x86_64.deb
COPY ./atlas/libmysqlclient.so.18 /usr/lib/libmysqlclient.so.18
# RUN wget -O /usr/lib/libmysqlclient.so.18 http://files.directadmin.com/services/es_7.0_64/libmysqlclient.so.18
# CMD /usr/local/mysql-proxy/bin/mysql-proxyd test start

# VOLUME /tmp
# ADD Atlas-2.2.1.el6.x86_64.rpm Atlas.rpm
# RUN rpm -i Atlas.rpm

WORKDIR /worden
VOLUME ["/worden"]