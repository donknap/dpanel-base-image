ARG BUILD_ALPINE_VERSION=latest
FROM alpine:${BUILD_ALPINE_VERSION}

ENV RUN_COMMAND='echo "Hello World Go"'

COPY ./entrypoint.sh /docker/entrypoint.sh
ENTRYPOINT [ "sh", "/docker/entrypoint.sh" ]