build:
	docker build \
	--build-arg BUILD_ALPINE_VERSION=1.21 \
	-t dpanel/base-image:go-1.21 .
	docker push dpanel/base-image:go-1.21

all: build