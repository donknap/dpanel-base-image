ARG BUILD_ALPINE_VERSION=latest
FROM alpine:${BUILD_ALPINE_VERSION}

ENV RUN_COMMAND='node -v'

RUN sed -i 's/dl-cdn.alpinelinux.org/mirrors.tuna.tsinghua.edu.cn/g' /etc/apk/repositories
RUN apk add --no-cache --update bash git curl tar zip unzip nodejs

COPY ./entrypoint.sh /docker/entrypoint.sh

ENTRYPOINT [ "sh", "/docker/entrypoint.sh" ]