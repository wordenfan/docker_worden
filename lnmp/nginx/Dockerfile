# docker build -t worden/nginx ./nginx
# docker run -d --name=nginxW -p 80:80 -p 8080:8080 --link phpW --volumes-from phpW  -it worden/nginx

# -v 宿主机:镜像路径 eg:-v ~/Code/worden:/usr/share/nginx/html
# --link name:alias

FROM nginx:1.9

# ADD  ./conf  /etc/nginx/conf.d
ADD  ./conf/yisa_mis.conf  /etc/nginx/conf.d/yisa_mis.conf
ADD  ./conf/ngrok.conf  /etc/nginx/conf.d/ngrok.conf
ADD  ./conf/test.conf  /etc/nginx/conf.d/test.conf

# ADD  ./sites-available    /etc/nginx/sites-available
ADD  ./logs                /var/log/nginx



RUN   cp /etc/apt/sources.list /etc/apt/sources.list.bak

RUN   echo "">sources.list
RUN   echo "deb http://mirrors.aliyun.com/ubuntu/ xenial main restricted universe multiverse">>sources.list
RUN   echo "deb http://mirrors.aliyun.com/ubuntu/ xenial-security main restricted universe multiverse">>sources.list
RUN   echo "deb http://mirrors.aliyun.com/ubuntu/ xenial-updates main restricted universe multiverse">>sources.list
RUN   echo "deb http://mirrors.aliyun.com/ubuntu/ xenial-backports main restricted universe multiverse">>sources.list
RUN   echo "deb http://mirrors.aliyun.com/ubuntu/ xenial-proposed main restricted universe multiverse">>sources.list
RUN   echo "deb-src http://mirrors.aliyun.com/ubuntu/ xenial main restricted universe multiverse">>sources.list
RUN   echo "deb-src http://mirrors.aliyun.com/ubuntu/ xenial-security main restricted universe multiverse">>sources.list
RUN   echo "deb-src http://mirrors.aliyun.com/ubuntu/ xenial-updates main restricted universe multiverse">>sources.list
RUN   echo "deb-src http://mirrors.aliyun.com/ubuntu/ xenial-backports main restricted universe multiverse">>sources.list
RUN   echo "deb-src http://mirrors.aliyun.com/ubuntu/ xenial-proposed main restricted universe multiverse">>sources.list
RUN   echo "deb http://archive.canonical.com/ubuntu/ xenial partner">>sources.list
RUN   echo "deb http://extras.ubuntu.com/ubuntu/ xenial main">>sources.list

RUN apt-get update
RUN apt-get -y install vim

WORKDIR /etc/nginx/conf.d

VOLUME ["/etc/nginx/conf.d"]
