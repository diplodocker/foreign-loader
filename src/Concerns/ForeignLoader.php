<?php
declare(strict_types = 1);

namespace Diplodocker\Concerns;

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

/**
 * Trait for load foreign keys from migration file
 * @see README.md
 * Trait ForeignLoader
 */
trait ForeignLoader
{
    /**
     * Foreign keys loader
     */
    protected function loadForeignKeys(): void
    {
        foreach ($this->keys as $from => $to) {
            [$fromName, $fromKey] = explode('.', $from);
            [$toName, $toKey] = explode('.', $to);

            Schema::table($fromName, static function (Blueprint $table) use (
                $fromKey,
                $toKey,
                $toName
            ) {
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
            [$fromName,] = explode('.', $from);
            [, $fromKey] = explode('.', $from);

            Schema::table(
                $fromName,
                static function (Blueprint $table) use ($fromKey) {
                    $table->dropForeign($fromKey);
                }
            );
        }
    }
}
