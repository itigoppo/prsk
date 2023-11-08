FROM php:8.0-fpm
RUN apt-get update \
    && apt-get install -y \
    git \
    zip \
    unzip \
    vim \
    libfreetype6-dev \
    libjpeg62-turbo-dev \
    libmcrypt-dev \
    libpng-dev \
    libfontconfig1 \
    libxrender1

RUN docker-php-ext-configure gd --with-freetype --with-jpeg
RUN docker-php-ext-install gd
RUN docker-php-ext-install bcmath
RUN docker-php-ext-install pdo_mysql mysqli exif
RUN cd /usr/bin && curl -s http://getcomposer.org/installer | php && ln -s /usr/bin/composer.phar /usr/bin/composer

ENV NODE_VERSION=16.16.0
RUN curl -o- https://raw.githubusercontent.com/nvm-sh/nvm/v0.39.3/install.sh | bash
ENV NVM_DIR=/root/.nvm
RUN . "$NVM_DIR/nvm.sh" && nvm install ${NODE_VERSION}
RUN . "$NVM_DIR/nvm.sh" && nvm use v${NODE_VERSION}
RUN . "$NVM_DIR/nvm.sh" && nvm alias default v${NODE_VERSION}
ENV PATH="/root/.nvm/versions/node/v${NODE_VERSION}/bin/:${PATH}"
RUN node --version
RUN npm --version


COPY ./.vimrc /root/.vimrc

RUN apt-get update \
    && apt-get install -y zsh git

RUN curl -fsSL "https://github.com/peco/peco/releases/download/v0.5.10/peco_linux_amd64.tar.gz" | \
    tar -xz --to-stdout peco_linux_amd64/peco > /usr/bin/peco
RUN chmod +x /usr/bin/peco

RUN sh -c "$(curl -fsSL https://raw.githubusercontent.com/ohmyzsh/ohmyzsh/master/tools/install.sh)" \
    && git clone https://github.com/zsh-users/zsh-completions ${ZSH_CUSTOM:=~/.oh-my-zsh/custom}/plugins/zsh-completions \
    && git clone https://github.com/zsh-users/zsh-autosuggestions ${ZSH_CUSTOM:-~/.oh-my-zsh/custom}/plugins/zsh-autosuggestions

COPY ./zsh/.zshrc /root/.zshrc
COPY ./zsh/custom/docker.zsh-theme /root/.oh-my-zsh/custom/themes/docker.zsh-theme
COPY ./zsh/custom/*.zsh /root/.oh-my-zsh/custom/
