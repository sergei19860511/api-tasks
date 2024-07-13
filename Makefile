init: install stop start

.PHONY: help

SAIL := ./vendor/bin/sail

install: ## Setup project and install dependencies.
	@cp .env.example .env
	@composer install
	@npm install
	@php artisan key:generate

start: ## Start containers.
	$(SAIL) up -d
	@sleep 5
	$(SAIL) artisan optimize:clear
	$(SAIL) artisan migrate --seed
	@npm run dev

stop: ## Stop containers.
	$(SAIL) stop
