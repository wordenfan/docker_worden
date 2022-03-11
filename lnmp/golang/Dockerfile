# docker build -t worden/golang ./golang
# docker run -d --name=src_golangW_1 --link src_mysqlW_1:src_mysqlW_1 --link src_redisW_1:src_redisW_1 -v ~/Code/worden:/worden -it worden/golang

FROM golang:1.16.3

RUN apt-get update && apt-get install -y vim

RUN apt-get install -y supervisor
# VOLUME ["/usr/local"]

ENV GOPATH /golang
ENV GOPROXY "https://goproxy.cn,direct"
ENV GO111MODULE on
ENV GOPATH /worden/golang
ENV GOBIN /worden/golang/bin
ENV PATH $PATH:$GOPATH/bin

WORKDIR /worden/golang/src