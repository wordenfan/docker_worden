# docker build -t worden/golang ./golang
# docker run -d --name=src_golangW_1 --link src_mysqlW_1:src_mysqlW_1 --link src_redisW_1:src_redisW_1 -v ~/Code/worden:/worden -it worden/golang

FROM golang:1.13.0

RUN apt-get update && apt-get install -y vim

# VOLUME ["/usr/local"]

ENV PATH $PATH:$GOPATH/bin

ENV GOPATH /worden/golang/src

WORKDIR /worden/golang/src