build-amd64: clean
	docker build \
	--platform linux/amd64 \
	-t dpanel/explorer .
	docker save dpanel/explorer -o ~/Downloads/image-amd64.tar
build-arm64: clean
	docker build \
	--platform linux/arm64 \
	-t dpanel/explorer .
	docker save dpanel/explorer -o ~/Downloads/image-arm64.tar
build-arm: clean
	docker build \
	--platform linux/arm/v7 \
	-t dpanel/explorer .
	docker save dpanel/explorer -o ~/Downloads/image-arm.tar
clean:
	docker rmi dpanel/explorer
all: build-amd64 build-arm64 build-arm