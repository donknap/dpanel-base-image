build:
	docker build \
	--build-arg BUILD_ALPINE_VERSION=3.18 \
	-t dpanel/base-image:html-common .
	docker push dpanel/base-image:html-common

all: build