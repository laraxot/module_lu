#!/bin/sh
php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');"
php composer-setup.php
php -r "unlink('composer-setup.php');"
php -r "unlink('composer.lock');"
rm composer.lock
rm package-lock.json

##############  ####################
php -d memory_limit=-1 composer.phar require -W illuminate/contracts
<<<<<<< HEAD
<<<<<<< HEAD
php -d memory_limit=-1 composer.phar require -W laraxot/module_xot
php -d memory_limit=-1 composer.phar require -W laravel/ui
php -d memory_limit=-1 composer.phar require -W laravel/passport
=======
>>>>>>> 8922e79 (.)
=======
php -d memory_limit=-1 composer.phar require -W laraxot/module_xot
php -d memory_limit=-1 composer.phar require -W laravel/ui
php -d memory_limit=-1 composer.phar require -W laravel/passport
>>>>>>> 19a54d4 (.)

############################ DEV ###############################
php -d memory_limit=-1 composer.phar require -W --dev laravel/pint
php -d memory_limit=-1 composer.phar require -W --dev nunomaduro/collision
php -d memory_limit=-1 composer.phar require -W --dev nunomaduro/larastan
php -d memory_limit=-1 composer.phar require -W --dev orchestra/testbench
php -d memory_limit=-1 composer.phar require -W --dev pestphp/pest
php -d memory_limit=-1 composer.phar require -W --dev pestphp/pest-plugin-arch
php -d memory_limit=-1 composer.phar require -W --dev pestphp/pest-plugin-laravel
php -d memory_limit=-1 composer.phar require -W --dev phpstan/extension-installer
php -d memory_limit=-1 composer.phar require -W --dev phpstan/phpstan-deprecation-rules
php -d memory_limit=-1 composer.phar require -W --dev phpstan/phpstan-phpunit
php -d memory_limit=-1 composer.phar require -W --dev spatie/laravel-ray
