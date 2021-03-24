# docker build -t worden/redis ./redis
# docker run -d --name=redisW -p 6379:6379 -it worden/redis /bin/bash

# FROM redis:4
FROM redis:5.0.5

RUN apt-get update
RUN apt-get -y install vim
RUN apt-get -y install procps