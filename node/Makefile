build-node12:
	docker build \
	--build-arg BUILD_ALPINE_VERSION=3.12 \
	-t dpanel/base-image:node-12 .
	docker push dpanel/base-image:node-12

build-node14:
	docker build \
	--build-arg BUILD_ALPINE_VERSION=3.14 \
	-t dpanel/base-image:node-14 .
	docker push dpanel/base-image:node-14

build-node16:
	docker build \
	--build-arg BUILD_ALPINE_VERSION=3.16 \
	-t dpanel/base-image:node-16 .
	docker push dpanel/base-image:node-16

build-node18:
	docker build \
	--build-arg BUILD_ALPINE_VERSION=3.18 \
	-t dpanel/base-image:node-18 .
	docker push dpanel/base-image:node-18

all: build-node12 build-node14 build-node16 build-node18