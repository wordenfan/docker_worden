# docker build -t worden/gesoo ./nodejs
# docker run -d --name=nodejsW -p 1337:1337 -p 27017:27017 -it worden/nodejs /bin/bash

# FROM node:12.16 as builder

# COPY package*.json ./
# COPY index.js ./



# 配置环境变量
# ENV HOST 0.0.0.0
# ENV PORT 3333
# CMD ["node","index.js"]

# RUN mv /etc/apt/sources.list /etc/apt/sources.list.bak && \
    # echo "deb http://mirrors.aliyun.com/ubuntu/ bionic main restricted universe multiverse" >>/etc/apt/sources.list && \
    # echo "deb http://mirrors.aliyun.com/ubuntu/ bionic-security main restricted universe multiverse" >>/etc/apt/sources.list && \
    # echo "deb http://mirrors.aliyun.com/ubuntu/ bionic-updates main restricted universe multiverse" >>/etc/apt/sources.list && \
    # echo "deb http://mirrors.aliyun.com/ubuntu/ bionic-proposed main restricted universe multiverse" >>/etc/apt/sources.list && \
    # echo "deb http://mirrors.aliyun.com/ubuntu/ bionic-backports main restricted universe multiverse" >>/etc/apt/sources.list && \
    # echo "deb-src http://mirrors.aliyun.com/ubuntu/ bionic main restricted universe multiverse" >>/etc/apt/sources.list && \
    # echo "deb-src http://mirrors.aliyun.com/ubuntu/ bionic-security main restricted universe multiverse" >>/etc/apt/sources.list && \
    # echo "deb-src http://mirrors.aliyun.com/ubuntu/ bionic-updates main restricted universe multiverse" >>/etc/apt/sources.list && \
    # echo "deb-src http://mirrors.aliyun.com/ubuntu/ bionic-proposed main restricted universe multiverse" >>/etc/apt/sources.list && \
    # echo "deb-src http://mirrors.aliyun.com/ubuntu/ bionic-backports main restricted universe multiverse" >>/etc/apt/sources.list

# RUN npm config set registry https://registry.npm.taobao.org

# WORKDIR /lx/gesoo_pro_for_test/parse_demo
# EXPOSE 1337
# EXPOSE 4040


FROM mongo:4.2
# 从编译阶段的中拷贝编译结果到当前镜像中
# COPY --from=builder

RUN mv /etc/apt/sources.list /etc/apt/sources.list.bak
ADD ./sources.list  /etc/apt/sources.list
RUN apt-get clean
RUN apt-get update
RUN apt-get -y install vim --allow-unauthenticated
RUN apt-get -y install curl --allow-unauthenticated
RUN apt-get -y install wget --allow-unauthenticated
RUN apt-get -y install net-tools --allow-unauthenticated
RUN apt-get -y install iputils-ping --allow-unauthenticated
RUN apt-get -y install git --allow-unauthenticated

# node环境
RUN apt-get -y install npm
RUN npm config set registry https://registry.npm.taobao.org
COPY package*.json ./
COPY index.js ./

EXPOSE 1337
EXPOSE 4040
EXPOSE 27017

WORKDIR /lx/gesoo_pro_for_test/parse_demo
VOLUME /worden/docker_data/mongo /data/db

# /etc/init.d/mongodb start
