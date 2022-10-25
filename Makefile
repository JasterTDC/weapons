PHP_COMPOSER=docker run --rm --env COMPOSER_CACHE_DIR="/tmp/cache" -v ${PWD}:/code -v ${PWD}/.composer:/tmp/cache -w /code composer:latest composer
PHP=docker run --rm --network=formation_network -v ${PWD}:/code -w /code php:8-fpm php
CPHP=docker run --rm --network=formation_network -v ${PWD}:/code -w /code jastertdc:php-8-fpm
PHP_UNIT=${CPHP} php /code/vendor/bin/phpunit -c /code/phpunit.xml
DCOMPOSE=docker-compose

deps/up:
	@echo "-----------------------------------------------"
	@echo " Starting services "
	@echo "-----------------------------------------------"
	@${DCOMPOSE} up -d

deps/down:
	@echo "-----------------------------------------------"
	@echo " Shutdown services "
	@echo "-----------------------------------------------"
	@${DCOMPOSE} down

down: deps/down

composer-require:
	@echo "┌―――――――――――――――――――――――――――――――――――――――――――――┐"
	@echo "| Installing composer dependencies"
	@echo "└―――――――――――――――――――――――――――――――――――――――――――――┘"
	@${PHP_COMPOSER} require ${args}

composer-install:
	@echo "┌―――――――――――――――――――――――――――――――――――――――――――――┐"
	@echo "| Installing composer dependencies"
	@echo "└―――――――――――――――――――――――――――――――――――――――――――――┘"
	@${PHP_COMPOSER} install

composer-dump-autoload:
	@echo "┌―――――――――――――――――――――――――――――――――――――――――――――┐"
	@echo "| Composer dump autoload										  			  |"
	@echo "└―――――――――――――――――――――――――――――――――――――――――――――┘"
	@${PHP_COMPOSER} require dump-autoload

unit-test:
	@echo "┌―――――――――――――――――――――――――――――――――――――――――――――┐"
	@echo "| Running unit test														 |"
	@echo "└―――――――――――――――――――――――――――――――――――――――――――――┘"
	@${PHP_UNIT} --testsuite Unit ${args} --no-coverage

integration-test: deps/up
	@echo "--------------------------------------------"
	@echo " Running integration test"
	@echo "--------------------------------------------"
	@${PHP_UNIT} --testsuite Integration --no-coverage

unit-test-coverage:
	@echo "┌―――――――――――――――――――――――――――――――――――――――――――――┐"
	@echo "| Running unit test with coverage										  |"
	@echo "└―――――――――――――――――――――――――――――――――――――――――――――┘"
	@${PHP_UNIT} --testsuite Unit

coverage:
	@echo "┌―――――――――――――――――――――――――――――――――――――――――――――┐"
	@echo "| Running unit test with coverage										  |"
	@echo "└―――――――――――――――――――――――――――――――――――――――――――――┘"
	@${PHP_UNIT}

mutant-test:
	@${CPHP} /code/vendor/bin/infection

sniffer:
	@${PHP} /code/vendor/bin/phpcs --standard=PSR12 /code/src /code/test

stan:
	@${PHP} /code/vendor/bin/phpstan analyze -l max /code/src

cli:
	docker run --rm -it \
	-v ${PWD}:/code \
	-w /code \
	jastertdc:php-8-fpm bash

pre-commit-hook:
	ln -s ../../pre-commit .git/hooks/pre-commit

create-network:
	docker network create formation_network
