# docker build -t worden/java ./java
# docker run -d --name=lx_java -p 8080:3306 -v ~/Code/dockerEnv/src/mysql/data:/var/lib/mysql -e MYSQL_ROOT_PASSWORD=123456 -it worden/mysql


FROM java:8

# ADD ./my_custom.cnf /etc/mysql/conf.d/my_custom.cnf

WORKDIR /java

VOLUME ["/java"]

# ADD ./project-demo-1.0.0.jar project-demo.jar
# RUN bash -c 'touch /project-demo.jar'
# ENTRYPOINT ["java","-jar","/project-demo.jar"]