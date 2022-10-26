<?php

declare(strict_types=1);

use Illuminate\Database\Schema\Blueprint;
// ---- models ---
use Modules\Xot\Database\Migrations\XotBaseMigration;

/**
 * Class CreatePasswordResetsTable.
 */
class CreatePasswordResetsTable extends XotBaseMigration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        // $old_table = 'groupusers';
        // if ($this->getConn()->hasTable($old_table)) {
        //    $this->getConn()->rename($old_table, $this->getTable());
        // }
        // -- CREATE --
        $this->tableCreate(
            function (Blueprint $table) {
                // $table->increments('id');
                // with index  SQLSTATE[42000]: Syntax error or access violation: 1071 Specified key was too long; max key length is 767 bytes
                // => so i add ID increments, remember to test it
                // $table->string('email');
                // $table->string('email')->index();
                $table->string('email', 191)->index();
                $table->string('token');
                // $table->rememberToken();
                $table->timestamps();
                $table->string('created_by')->nullable();
                $table->string('updated_by')->nullable();
            }
        );
        // -- UPDATE --
        $this->tableUpdate(
            function (Blueprint $table) {
                if ($this->hasColumn('auth_user_id') && ! $this->hasColumn('user_id')) {
                    $table->renameColumn('auth_user_id', 'user_id');
                }
            }
        );
    }
}
