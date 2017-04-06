# docker build -t worden/golang ./golang
# docker run -d --name=src_golangW_1 --link src_mysqlW_1:src_mysqlW_1 --link src_redisW_1:src_redisW_1 -v ~/Code/worden:/worden -it worden/golang

FROM golang:1.7.5


#===系统升级===
# ADD ./sources.list /etc/apt/sources.list

# RUN apt-get update && apt-get install -y \
#        vim

WORKDIR /worden

VOLUME ["/worden"]
