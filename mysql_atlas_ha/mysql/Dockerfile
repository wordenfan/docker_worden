# docker build -t worden/mysql ./mysql
# docker run -d --name=lx_mysql -p 3306:3306 -v ~/Code/dockerEnv/src/mysql/data:/var/lib/mysql -e MYSQL_ROOT_PASSWORD=123456 -it worden/mysql

FROM mysql:5.7

ARG APP_NAME=keepalived \
	APP_USER=keepalived \
	APP_EXEC=keepalived \
	APP_VERSION=2.1.5
ENV LANG=C.UTF-8
RUN echo "Asia/Shanghai" > /etc/timezone

COPY ./sources.list /etc/apt/sources.list
RUN apt-key adv --keyserver hkp://keyserver.ubuntu.com:80 --recv 467B942D3A79BD29
RUN apt-get clean
RUN apt-get update 

RUN apt-get install -y vim gcc 
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

# COPY而不是ADD，这是由于ADD指令会 自动解压tar文件
COPY ./keepalived/keepalived-2.1.5.tar.gz /worden/keepalived-2.1.5.tar.gz
WORKDIR /worden
RUN tar -zxvf keepalived-2.1.5.tar.gz
RUN cd keepalived-2.1.5 \
    && ./configure --prefix=/usr/local/keepalived --disable-dynamic-linking \
    && make -j "$(nproc)" \
    && make install; 

WORKDIR /worden

# 应用程序的服务命令，必须使用非守护进程方式运行。如果使用变量，则该变量必须在运行环境中存在（ENV可以获取）
# CMD ["keepalived", "-f", "/srv/conf/keepalived/keepalived.conf", "--dont-fork", "--vrrp", "--log-console" ]