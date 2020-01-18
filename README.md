# Laravel foreign keys loader helper
![Header](https://i.imgur.com/UHQ0hav.png)

[![Build Status](https://travis-ci.org/diplodocker/foreign-loader.svg?branch=master)](https://travis-ci.org/diplodocker/foreign-loader)
[![Made for Laravel](https://img.shields.io/badge/made%20for-laravel-orange.svg?style=flat&logo=Laravel&logoColor=fff)](https://laravel.com/)
![PHP from Packagist](https://img.shields.io/packagist/php-v/diplodocker/foreign-loader.svg?color=8a92bb&logo=php&logoColor=fff)

Diplodocker project helpers

### Install
* Install [laravel](https://laravel.com/docs/master/installation) =)
* `composer require --dev diplodocker/foreign-loader`


### Use class
```php
<?php

use Diplodocker\ForeignKeysMigration;

class SomeMigrationFileName extends ForeignKeysMigration
{
    public $keys = [
        'user.city_id' => 'city.id',
        'user.company_id' => 'company.id',
        ...
    ];

```


### Or use trait
```php
<?php

use Diplodocker\Concerns\ForeignLoader;
use Illuminate\Database\Migrations\Migration;

class SomeMigrationFileName extends Migration
{
    // use trait
    use ForeignLoader;

    // set ON_UPDATE and ON_DELETE actions
    public const ON_UPDATE = 'restrict';
    public const ON_DELETE = 'restrict';

    public $keys = [
        'user.city_id' => 'city.id',
        'user.company_id' => 'company.id',
        ...
    ];

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // your code here
        $this->loadForeignKeys();
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // your code here
        $this->dropForeignKeys();
    }

```
