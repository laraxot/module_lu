<?php

declare(strict_types=1);

use Illuminate\Database\Schema\Blueprint;
// ---- models ---
use Modules\Xot\Database\Migrations\XotBaseMigration;

/**
 * Class CreateGroupRightTable.
 */
class CreateGroupRightTable extends XotBaseMigration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        // -- senza il prefix !
        // $old_table = 'area_admin_areas';
        // if ($this->getConn()->hasTable($old_table)) {
        //    $this->getConn()->rename($old_table, $this->getTable());
        // }
        // -- CREATE --
        $this->tableCreate(
            function (Blueprint $table) {
                $table->increments('id');
                $table->integer('group_id')->unsigned()->default(0);
                $table->integer('right_id')->unsigned()->default(0);
                $table->boolean('right_level')->nullable()->default(3);
                // $table->primary(['group_id','right_id']);//meglio usare id..
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
