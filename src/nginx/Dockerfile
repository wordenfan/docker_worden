# docker build -t worden/nginx ./nginx
# docker run -d --name=nginxW -p 80:80 --link phpW --volumes-from phpW  -it worden/nginx

# -v 宿主机:镜像路径 eg:-v ~/Code/worden:/usr/share/nginx/html
# --link name:alias

FROM nginx:1.9

ADD  ./conf/demo_a.conf  /etc/nginx/conf.d/demo_a.conf
ADD  ./conf/gaia.conf  /etc/nginx/conf.d/gaia.conf

# ADD  ./sites-available    /etc/nginx/sites-available
ADD  ./logs                /var/log/nginx

# RUN apt-get update
# RUN apt-get -y install vim

WORKDIR /worden

VOLUME ["/worden"]
