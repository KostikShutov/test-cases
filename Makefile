.PHONY: up
up:
	docker run \
        -v $(pwd)/tank:/var/loadtest \
        -v $SSH_AUTH_SOCK:/ssh-agent -e SSH_AUTH_SOCK=/ssh-agent \
        --net host \
        -it yandex/yandex-tank
