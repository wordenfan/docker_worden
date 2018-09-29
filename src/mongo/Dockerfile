# docker build -t worden/mongo ./mongo
# docker run -d --name=mongoW -p 27017:27017 -v ~/Code/worden/docker_data/mongo:/data/db -it worden/mongo /bin/bash

# copy from https://github.com/laradock/laradock/blob/master/mongo/Dockerfile

FROM mongo:4.1

MAINTAINER Mahmoud Zalt <mahmoud@zalt.me>

#COPY mongo.conf /usr/local/etc/mongo/mongo.conf

# VOLUME /worden/docker_data/mongo /data/db

CMD ["mongod"]

EXPOSE 27017
