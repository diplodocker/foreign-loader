environment:
	@sudo apt-get update -q
	@sudo apt-get install -y curl

test:
	@curl -OL https://squizlabs.github.io/PHP_CodeSniffer/phpcs.phar
	@php phpcs.phar src/
