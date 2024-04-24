build-node12:
	docker build \
	--build-arg BUILD_ALPINE_VERSION=3.12 \
	-t donknap/dpanel:node-12 .

build-node14:
	docker build \
	--build-arg BUILD_ALPINE_VERSION=3.14 \
	-t donknap/dpanel:node-14 .

build-node16:
	docker build \
	--build-arg BUILD_ALPINE_VERSION=3.16 \
	-t donknap/dpanel:node-16 .

build-node18:
	docker build \
	--build-arg BUILD_ALPINE_VERSION=3.18 \
	-t donknap/dpanel:node-18 .

all: build-node12 build-node14 build-node16 build-node18