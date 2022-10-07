FROM mysql:5.7
MAINTAINER docker-db

COPY ./my.cnf /etc/mysql/my.cnf
RUN mkdir /var/log/mysql
RUN chown mysql:mysql /var/log/mysql
RUN touch /var/log/mysql/mysqld.log
