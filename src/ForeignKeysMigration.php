<?php
declare(strict_types = 1);

namespace Diplodocker;

use Diplodocker\Concerns\ForeignLoader;
use Illuminate\Database\Migrations\Migration;

/**
 * Foreign keys loader migration
 * Class ForeignKeysMigration
 * @package Diplodocker
 */
class ForeignKeysMigration extends Migration
{
    /**
     * Include trait
     */
    use ForeignLoader;

    /**
     * Defaults
     */
    public const ON_UPDATE = 'restrict';
    public const ON_DELETE = 'restrict';

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $this->loadForeignKeys();
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        $this->dropForeignKeys();
    }
}
