FROM php:8.3-fpm

WORKDIR /home
RUN apt-get update &&  \
    apt-get install -y curl  \
    git -y \
    zlib1g-dev \
    libzip-dev
#    php-xm \
#    php-mbstring \
#    php-curl \
#    php-mysql

RUN curl -sS https://getcomposer.org/installer | php
RUN mv composer.phar /usr/bin/composer

RUN ["/bin/bash", "-c", "echo PATH=$PATH:~/.composer/vendor/bin/ >> ~/.bashrc"]
RUN ["/bin/bash", "-c", "source ~/.bashrc"]

RUN docker-php-ext-configure zip
RUN docker-php-ext-install zip
RUN docker-php-ext-install pdo pdo_mysql
RUN docker-php-ext-install mysqli && docker-php-ext-enable mysqli

RUN mkdir -p /home/blog-api/storage && \
    mkdir -p /home/blog-api/bootstrap/cache

RUN chown -R $USER:www-data /home/blog-api/storage
RUN chown -R $USER:www-data /home/blog-api/bootstrap/cache
#RUN chown $USER /Users/$USER/.docker/buildx/current
RUN chmod 775 -R /home/blog-api/bootstrap/cache
RUN chmod 775 -R /home/blog-api/storage

EXPOSE 9000
CMD ["php-fpm"]
