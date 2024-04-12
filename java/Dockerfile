ARG BUILD_ALPINE_VERSION=latest
FROM alpine:${BUILD_ALPINE_VERSION}

ARG BUILD_JDK_VERSION=""

ENV ENV_JAVA_VERSION=${BUILD_PHP_VERSION}
ENV RUN_COMMAND='java -version'

RUN echo "Build Java version: ${BUILD_JDK_VERSION}"
RUN sed -i 's/dl-cdn.alpinelinux.org/mirrors.tuna.tsinghua.edu.cn/g' /etc/apk/repositories
RUN apk add --no-cache --update bash git curl tar zip unzip openjdk${BUILD_JDK_VERSION}

COPY ./entrypoint.sh /docker/entrypoint.sh

ENTRYPOINT [ "sh", "/docker/entrypoint.sh" ]