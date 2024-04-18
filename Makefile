.PHONY: help
.DEFAULT_GOAL := help

help:
	@echo ------------------------------------------------
	@echo phpunit - Run unit tests
	@echo cs-fix - Run coding style fixer
	@echo ------------------------------------------------

.PHONY: phpunit
phpunit: ## Run unit tests
	php ./vendor/bin/phpunit

.PHONY: cs-fix
cs-fix: ## Run coding style fixer
	php ./tools/php-cs-fixer/vendor/bin/php-cs-fixer fix src