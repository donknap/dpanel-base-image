ARG BUILD_ALPINE_VERSION=latest
FROM golang:${BUILD_ALPINE_VERSION}-alpine

ENV RUN_COMMAND='echo "Hello World Go" && go version'

WORKDIR /app
VOLUME [ "/app" ]

COPY ./entrypoint.sh /docker/entrypoint.sh

ENTRYPOINT [ "sh", "/docker/entrypoint.sh" ]