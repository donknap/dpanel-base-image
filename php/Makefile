# build-php56:
# 	docker build --no-cache \
# 	--build-arg BUILD_ALPINE_VERSION=3.8 \
# 	--build-arg BUILD_PHP_VERSION=5 \
# 	-t donknap/dpanel:php-56 .

build-php72:
	docker build \
	--build-arg BUILD_ALPINE_VERSION=3.9 \
	--build-arg BUILD_PHP_VERSION=7 \
	--build-arg BUILD_PHP_SHOW_VERSION=7.2 \
	--build-arg BUILD_PHP_SWOOLE_VERSION=4.5.2 \
	-t dpanel/base-image:php-72 .
	docker push dpanel/base-image:php-72

build-php74:
	docker build \
	--build-arg BUILD_ALPINE_VERSION=3.15 \
	--build-arg BUILD_PHP_VERSION=7 \
	--build-arg BUILD_PHP_SHOW_VERSION=7.4 \
	--build-arg BUILD_PHP_SWOOLE_VERSION=4.5.11 \
	-t dpanel/base-image:php-74 .
	docker push dpanel/base-image:php-74

build-php81:
	docker build \
	--build-arg BUILD_ALPINE_VERSION=3.18 \
	--build-arg BUILD_PHP_VERSION=81 \
	--build-arg BUILD_PHP_SHOW_VERSION=8.1 \
	--build-arg BUILD_PHP_SWOOLE_VERSION=5.0.2 \
	-t dpanel/base-image:php-81 .
	docker push dpanel/base-image:php-81

all: build-php72 build-php74 build-php81