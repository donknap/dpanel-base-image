build-java8:
	docker build \
	--build-arg BUILD_ALPINE_VERSION=3.18 \
	--build-arg BUILD_JDK_VERSION=8 \
	-t donknap/dpanel:java-8 .

build-java12:
	docker build \
	--build-arg BUILD_ALPINE_VERSION=3.18 \
	--build-arg BUILD_JDK_VERSION=12 \
	-t donknap/dpanel:java-12 .

build-java11:
	docker build \
	--build-arg BUILD_ALPINE_VERSION=3.18 \
	--build-arg BUILD_JDK_VERSION=11 \
	-t donknap/dpanel:java-11 .

all: build-java8 build-java12 build-java11