# docker build -t worden/golang ./golang
# docker run -d --name=src_golangW_1 --link src_mysqlW_1:src_mysqlW_1 --link src_redisW_1:src_redisW_1 -v ~/Code/worden:/worden -it worden/golang

FROM golang:1.16.0

RUN apt-get update && apt-get install -y vim

# VOLUME ["/usr/local"]

ENV GO111MODULE=on
ENV GOPROXY=https://goproxy.cn,direct
ENV GOPATH /worden/golang
ENV GOBIN /worden/golang/bin
ENV PATH $PATH:$GOPATH/bin


WORKDIR /worden/golang/src