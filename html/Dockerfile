ARG BUILD_ALPINE_VERSION=latest
FROM alpine:${BUILD_ALPINE_VERSION}

ENV RUN_COMMAND='echo "Hello World Html"'

RUN sed -i 's/dl-cdn.alpinelinux.org/mirrors.tuna.tsinghua.edu.cn/g' /etc/apk/repositories
RUN apk add --no-cache --update bash git curl tar zip unzip nginx

COPY ./nginx/http.d/default.conf /etc/nginx/http.d/default.conf
COPY ./wwwroot/index.html /app/index.html


WORKDIR /app
VOLUME [ "/app" ]
EXPOSE 80

COPY ./entrypoint.sh /docker/entrypoint.sh
ENTRYPOINT [ "sh", "/docker/entrypoint.sh" ]