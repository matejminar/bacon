FROM ubuntu:16.04

MAINTAINER BRACKETS by TRIAD

RUN apt-get update \
    && apt-get install -y locales \
    && locale-gen en_US.UTF-8

ENV LANG en_US.UTF-8
ENV LANGUAGE en_US:en
ENV LC_ALL en_US.UTF-8

RUN apt-get update \
    && apt-get install -y curl zip unzip git software-properties-common \
    && add-apt-repository -y ppa:ondrej/php \
    && apt-get update \
    && apt-get install -y php7.3-fpm php7.3-cli php7.3-gd \
       php7.3-pgsql php7.3-imap php-memcached php7.3-mbstring php7.3-xml php7.3-curl \
       php7.3-imagick php7.3-zip php7.3-bcmath php7.3-xdebug php7.3-soap \
    && php -r "readfile('http://getcomposer.org/installer');" | php -- --install-dir=/usr/bin/ --filename=composer \
    && mkdir /run/php \
    && composer global require "laravel/installer" \
    && composer global require "brackets/craftable-installer" \
    && apt-get remove -y --purge software-properties-common \
    && apt-get -y autoremove \
    && apt-get clean \
    && rm -rf /var/lib/apt/lists/* /tmp/* /var/tmp/*

ENV PATH "$PATH:/root/.composer/vendor/bin"

COPY php-fpm.conf /etc/php/7.3/fpm/php-fpm.conf
COPY www.conf /etc/php/7.3/fpm/pool.d/www.conf
COPY xdebug.ini /etc/php/7.3/mods-available/xdebug.ini

RUN mkdir /root/.config \
    && chown -R root:root /root/.config

EXPOSE 9000

COPY docker-entrypoint.sh /usr/local/bin/docker-entrypoint.sh
RUN chmod +x /usr/local/bin/docker-entrypoint.sh

WORKDIR /var/www/html

ENTRYPOINT ["docker-entrypoint.sh"]

CMD ["php-fpm7.3"]

