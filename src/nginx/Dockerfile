# docker build -t worden/nginx ./nginx
# docker run -d --name=worden_nginx -p 80:80 --link worden_php --volumes-from worden_php  -it worden/nginx

# -v 宿主机:镜像路径 eg:-v ~/Code/worden:/usr/share/nginx/html
# --link name:alias

FROM nginx:1.9

ADD  ./conf/worden.conf  /etc/nginx/conf.d/worden.conf
ADD  ./conf/onethink.conf  /etc/nginx/conf.d/onethink.conf

# ADD  ./sites-available    /etc/nginx/sites-available
ADD  ./logs                /var/log/nginx

RUN apt-get update
RUN apt-get -y install vim

WORKDIR /worden

VOLUME ["/worden"]
