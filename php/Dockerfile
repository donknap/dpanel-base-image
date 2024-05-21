ARG BUILD_ALPINE_VERSION=latest
FROM alpine:${BUILD_ALPINE_VERSION}

ARG BUILD_PHP_VERSION=""
ARG BUILD_PHP_SHOW_VERSION=""
ARG BUILD_PHP_SWOOLE_VERSION=""

ENV ENV_PHP_VERSION=${BUILD_PHP_VERSION}
ENV TIMEZONE ${timezone:-"Asia/Shanghai"}
ENV RUN_USER nginx

RUN echo "Build PHP version: ${ENV_PHP_VERSION}"

RUN sed -i 's/dl-cdn.alpinelinux.org/mirrors.tuna.tsinghua.edu.cn/g' /etc/apk/repositories
RUN apk add --no-cache --update bash git curl tar zip unzip libressl tzdata pcre ca-certificates aria2 \
  nginx php${ENV_PHP_VERSION} php${ENV_PHP_VERSION}-fpm composer \
  php${ENV_PHP_VERSION}-pdo php${ENV_PHP_VERSION}-pdo_mysql php${ENV_PHP_VERSION}-pdo_sqlite \
  php${ENV_PHP_VERSION}-mysqli php${ENV_PHP_VERSION}-mysqlnd  \
  php${ENV_PHP_VERSION}-curl \
  php${ENV_PHP_VERSION}-gd \
  php${ENV_PHP_VERSION}-gettext \
  php${ENV_PHP_VERSION}-bcmath \
  php${ENV_PHP_VERSION}-iconv \
  php${ENV_PHP_VERSION}-ctype \
  php${ENV_PHP_VERSION}-dom \
  php${ENV_PHP_VERSION}-fileinfo \
  php${ENV_PHP_VERSION}-json \
  php${ENV_PHP_VERSION}-mbstring \
  php${ENV_PHP_VERSION}-openssl \
  php${ENV_PHP_VERSION}-tokenizer \
  php${ENV_PHP_VERSION}-xml \
  php${ENV_PHP_VERSION}-simplexml \
  php${ENV_PHP_VERSION}-xmlreader \
  php${ENV_PHP_VERSION}-xmlwriter \
  php${ENV_PHP_VERSION}-xsl \
  php${ENV_PHP_VERSION}-session \
  php${ENV_PHP_VERSION}-ftp \
  php${ENV_PHP_VERSION}-zip php${ENV_PHP_VERSION}-zlib php${ENV_PHP_VERSION}-bz2 \
  php${ENV_PHP_VERSION}-opcache \
  php${ENV_PHP_VERSION}-phar \
  php${ENV_PHP_VERSION}-posix \
  php${ENV_PHP_VERSION}-pcntl \
  php${ENV_PHP_VERSION}-sockets \
  php${ENV_PHP_VERSION}-sodium \
  php${ENV_PHP_VERSION}-sysvshm php${ENV_PHP_VERSION}-sysvmsg php${ENV_PHP_VERSION}-sysvsem \
  php${ENV_PHP_VERSION}-exif \
  php${ENV_PHP_VERSION}-pear \
  php${ENV_PHP_VERSION}-dev \
  php${ENV_PHP_VERSION}-pecl-apcu \
  php${ENV_PHP_VERSION}-pecl-redis \
  php${ENV_PHP_VERSION}-pecl-yaml \
  php${ENV_PHP_VERSION}-pecl-imagick

# fix aliyun oss wrong charset: https://github.com/aliyun/aliyun-oss-php-sdk/issues/101
RUN cd /tmp \
  && curl -O https://mirrors.cloud.tencent.com/alpine/edge/community/x86_64/gnu-libiconv-libs-1.17-r2.apk \
  && curl -O https://mirrors.cloud.tencent.com/alpine/edge/community/x86_64/gnu-libiconv-1.17-r2.apk \
  && apk add --no-cache --allow-untrusted gnu-libiconv-libs-1.17-r2.apk gnu-libiconv-1.17-r2.apk \
  && rm gnu-libiconv-*
ENV LD_PRELOAD /usr/lib/preloadable_libiconv.so php

# install php others extensions
RUN set -ex \
  # libs for swoole extension. libaio linux-headers
  && apk add --update-cache libstdc++ openssl \
  && apk add --update-cache --virtual .build-deps autoconf \ 
  dpkg-dev dpkg file g++ gcc libc-dev make pkgconf re2c \
  pcre-dev pcre2-dev zlib-dev libaio-dev openssl-dev \
  && pecl channel-update https://pecl.php.net/channel.xml \
  # php extension: swoole
  && cd /tmp \
  && apk add --update-cache c-ares-dev curl-dev \
  && aria2c -x 15 "http://pecl.php.net/get/swoole-${BUILD_PHP_SWOOLE_VERSION}.tgz" -o swoole.tgz \
  && pecl install --configureoptions 'enable-sockets="yes" enable-openssl="yes" enable-http2="yes" enable-mysqlnd="yes" enable-swoole-json="no" enable-swoole-curl="yes" enable-cares="yes"' swoole.tgz \
  && rm swoole.tgz \
  && echo "extension=swoole.so" > /etc/php${ENV_PHP_VERSION}/conf.d/20_swoole.ini \
  # install extension: memcached
  && apk add --update-cache libmemcached-dev \
  && pecl install memcached \
  && echo "extension=memcached.so" > /etc/php${ENV_PHP_VERSION}/conf.d/20_memcached.ini \
  # install extension: mcrypt
  && apk add --update-cache libmcrypt-dev \
  && pecl install mcrypt \
  && echo "extension=mcrypt.so" > /etc/php${ENV_PHP_VERSION}/conf.d/20_mcrypt.ini \
  # clear works
  && apk del --purge .build-deps \
  && rm -rf /var/cache/apk/* /tmp/* /usr/share/man

RUN set -ex \
  # config PHP
  && mkdir /usr/tmp \
  && chmod -R 755 /usr/tmp \
  && chown -R 1000:1000 /usr/tmp \
  # config timezone
  && ln -sf /usr/share/zoneinfo/${TIMEZONE} /etc/localtime \
  && echo "${TIMEZONE}" > /etc/timezone \
  # link php-fpm command
  && ln -s /usr/sbin/php-fpm${ENV_PHP_VERSION} /usr/sbin/php-fpm \
  # make root path
  && mkdir -p /app/nginx/http.d/ && mkdir -p /app/nginx/conf.d/ && mkdir -p /app/wwwroot \
  && mkdir -p /run/nginx

COPY ./nginx/conf.d/default.conf /app/nginx/conf.d/default.conf
COPY ./nginx/http.d/default.conf /app/nginx/http.d/default.conf
COPY ./nginx/nginx.conf /etc/nginx/nginx.conf
COPY ./php-fpm/php-fpm.conf /etc/php${ENV_PHP_VERSION}/php-fpm.d/www.conf.99.conf
COPY ./wwwroot/index.php /app/wwwroot/index.php
COPY ./entrypoint.sh /docker/entrypoint.sh

RUN chown -R nginx:nginx /app/wwwroot

WORKDIR /app
VOLUME [ "/app" ]
EXPOSE 80

ENTRYPOINT [ "sh", "/docker/entrypoint.sh" ]