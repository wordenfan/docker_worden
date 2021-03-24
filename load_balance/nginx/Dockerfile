# docker build -t worden/nginx ./nginx
# docker run -d --name=nginxW -p 80:80 -p 8080:8080 --link phpW --volumes-from phpW  -it worden/nginx

FROM nginx:1.9

# ADD  ./conf/se_a.conf  /etc/nginx/conf.d/se_a.conf
# ADD  ./conf/se_b.conf  /etc/nginx/conf.d/se_b.conf
# ADD  ./conf/ngrok.conf /etc/nginx/conf.d/ngrok.conf
# ADD  ./conf/test.conf  /etc/nginx/conf.d/test.conf

RUN cp /etc/apt/sources.list /etc/apt/sources.list.bak
RUN echo "" > /etc/apt/sources.list
RUN echo "deb http://mirrors.aliyun.com/debian jessie main" >> /etc/apt/sources.list
RUN echo "deb http://mirrors.aliyun.com/debian jessie-updates main" >> /etc/apt/sources.list
RUN apt-get clean

RUN apt-get update
RUN apt-get -y install vim
# RUN apt-get -y install gcc
# RUN apt-get -y install make

#===goaccess===
# RUN apt-get -y install geoip-database
# RUN apt-get -y install libgeoip-dev
# RUN apt-get -y install libncursesw5-dev
# RUN apt-get -y install libtokyocabinet-dev
# COPY ./software/goaccess-1.4.6.tar.gz /worden_software/goaccess-1.4.6.tar.gz
# WORKDIR /worden_software
# RUN tar -xf ./goaccess-1.4.6.tar.gz \
# && cd goaccess-1.4.6 \
# && ./configure --enable-utf8 --enable-geoip=legacy --with-getline --disable-dependency-tracking \
# && make \
# && make install 

WORKDIR /etc/nginx/conf.d
VOLUME ["/etc/nginx/conf.d"]
