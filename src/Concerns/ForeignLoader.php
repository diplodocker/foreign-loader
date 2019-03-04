<?php
declare(strict_types=1);

namespace Diplodocker\Concerns;

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;

/**
 * Trait for load foreign keys from migration file
 * @see README.md
 * Trait ForeignLoader
 * @package Database\Concerns
 */
trait ForeignLoader
{
    /**
     * Foreign keys loader
     */
    protected function loadForeignKeys(): void
    {
        foreach ($this->keys as $from => $to) {
            list($fromName, $fromKey) = explode('.', $from);
            list($toName, $toKey) = explode('.', $to);

            Schema::table($fromName, function (Blueprint $table) use ($fromKey, $toKey, $toName) {
                $table->foreign($fromKey)
                    ->references($toKey)
                    ->on($toName)
                    ->onUpdate(self::ON_UPDATE)
                    ->onDelete(self::ON_DELETE);
            });
        }
    }

    /**
     * Foreign keys remover
     */
    protected function dropForeignKeys(): void
    {
        foreach ($this->keys as $from => $on) {
            list($fromName,) = explode('.', $from);
            list(, $fromKey) = explode('.', $from);

            Schema::table($fromName, function (Blueprint $table) use ($fromKey) {
                $table->dropForeign($fromKey);
            });
        }
    }
}
