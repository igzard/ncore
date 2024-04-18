.PHONY: help
.DEFAULT_GOAL := help

help:
	@echo ------------------------------------------------
	@echo phpunit - Run PHPUnit
	@echo ------------------------------------------------

.PHONY: phpunit
phpunit: ## Build docker development environment
	php ./vendor/bin/phpunit