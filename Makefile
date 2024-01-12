-include .env

# fallback

help:
	@make --help

# environment

up:
	@vendor/bin/sail up -d

down:
	@vendor/bin/sail stop

key:
	@vendor/bin/sail artisan key:generate

# testing

test:
	@echo "\033[1;32m\n--- running editorconfig-checker ---\n\033[0m"
	@make -s editorconfig
	@echo "\033[1;32m\n--- running phpstan ---\n\033[0m"
	@make -s phpstan
	@echo "\033[1;32m\n--- running phpunit ---\n\033[0m"
	@make -s phpunit

editorconfig:
	@vendor/bin/sail bash ./vendor/bin/ec
	@echo "\e[42m                 \e[0m\n\e[42m\e[1m [OK] No errors  \e[0m\n\e[42m                 \e[0m"

phpstan:
	@vendor/bin/sail php ./vendor/bin/phpstan analyse -c phpstan.neon

phpunit:
	@vendor/bin/sail test

# connections

bash:
	@vendor/bin/sail shell
