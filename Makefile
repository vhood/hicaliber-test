-include .env

# fallback

help:
	@make --help

# environment

up:
	@vendor/bin/sail up -d

down:
	@vendor/bin/sail stop

# connections

bash:
	@vendor/bin/sail shell
