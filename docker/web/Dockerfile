FROM almalinux

MAINTAINER docker-web

# update dnf
RUN dnf -y update
RUN dnf -y install dnf-utils
RUN dnf clean all

# install epel-release
RUN dnf -y install epel-release

# install dev tool
RUN dnf -y groupinstall "Development Tools"
RUN dnf -y install git vim zsh curl
COPY .vimrc /root/.vimrc

# install remi repo
RUN dnf -y install https://rpms.remirepo.net/enterprise/remi-release-8.rpm

# inatall httpd
RUN dnf -y install httpd httpd-tools

# install php73
RUN \
  dnf -y install \
    php73-php \
    php73-php-mbstring \
    php73-php-common \
    php73-php-xml \
    php73-php-mysqlnd \
    php73-php-pdo \
    php73-php-gd \
    php73-php-cli \
    php73-php-intl \
    php73-php-opcache --nogpgcheck \
    php73-php-json \
    php73-php-pecl-xdebug

RUN ln -s /bin/php73 /bin/php

# clear dnf cache
RUN dnf clean all

# install composer
RUN curl -sS https://getcomposer.org/installer | php && \
  mv composer.phar /usr/local/bin/composer

# install Node.js
RUN dnf module enable nodejs:16 -y
RUN dnf install nodejs -y

# timezone setting
RUN cp /etc/localtime /etc/localtime.org
RUN ln -sf /usr/share/zoneinfo/Asia/Tokyo /etc/localtime

# for web
EXPOSE 80

COPY ./conf.d/vhosts.conf /etc/httpd/conf.d/vhosts.conf

RUN mv /etc/httpd/conf.modules.d/00-mpm.conf /etc/httpd/conf.modules.d/00-mpm.conf.origin
COPY ./conf.modules.d/00-mpm.conf /etc/httpd/conf.modules.d/00-mpm.conf

CMD /usr/sbin/httpd -DFOREGROUND
