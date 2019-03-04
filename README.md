# Laravel foreign keys loader helper
Diplodocker project helpers


### Install
* Install [laravel](https://laravel.com/docs/master/installation) =)
* `composer require diplodocker/foreign-loader --dev`

### Use trait
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
