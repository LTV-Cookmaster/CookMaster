MAKEFLAGS += --no-print-directory
.DEFAULT_GOAL = help
SAIL = ./vendor/bin/sail

help:
	@grep -E '(^[a-zA-Z0-9_-]+:.*?##.*$$)|(^##)' $(MAKEFILE_LIST) | awk 'BEGIN {FS = ":.*?## "}{printf "\033[32m%-30s\033[0m %s\n", $$1, $$2}' | sed -e 's/\[32m##/[33m/'

## —— Initialisation ———————————————————————————————————————————————————————————
init: ## initialise the development environment
	@if [ ! -f .env ]; then \
		(echo "\033[0;33mcannot access '.env': No such file or directory\033[0m"; exit 1) \
	fi

	$(SAIL) up -d --build && \
	$(SAIL) composer install && \
    $(SAIL) artisan key:generate && \
	$(SAIL) artisan migrate:fresh --force --seed && \
	$(SAIL) npm install && \
	make clear

composer-install: ## run composer install when there is no vendor folder
	docker run --rm \
    -u "$$(id -u):$$(id -g)" \
    -v $$(pwd):/var/www/html \
    -w /var/www/html \
    laravelsail/php82-composer:latest \
    composer install --ignore-platform-reqs

## —— Docker ———————————————————————————————————————————————————————————————————
up: ## start containers in the background
	$(SAIL) up -d

down: ## stop containers
	$(SAIL) down

## —— Artisan ——————————————————————————————————————————————————————————————————
clear: ## cache invalidation (route, cache, config, view)
	$(SAIL) artisan route:clear && \
	$(SAIL) artisan cache:clear && \
	$(SAIL) artisan config:clear && \
	$(SAIL) artisan view:clear

reset: ## refresh database and seed
	$(SAIL) artisan migrate:fresh --seed

test: ## run tests
	COMPOSE_PROFILES=testing $(SAIL) up -d
	$(SAIL) artisan test

tinker: ## exec a laravel shell
	$(SAIL) artisan tinker

lint: ## Lint php files to the laravel default style
	$(SAIL) php ./vendor/bin/pint --dirty
