<?php

declare(strict_types=1);

use Illuminate\Database\Schema\Blueprint;
use Modules\Xot\Database\Migrations\XotBaseMigration;

// --- models --

/**
 * Class CreateAreaPermUserTable.
 */
class CreateAreaPermUserTable extends XotBaseMigration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        // -- senza il prefix !
        $old_table = 'area_admin_areas';
        if ($this->getConn()->hasTable($old_table)) {
            $this->getConn()->rename($old_table, $this->getTable());
        }
        // -- CREATE --
        $this->tableCreate(
            function (Blueprint $table) {
                $table->increments('id');
                $table->integer('area_id')->unsigned()->default(0)->nullable();
                $table->integer('perm_user_id')->unsigned()->default(0)->nullable();

                $table->timestamps();
                $table->string('created_by')->nullable();
                $table->string('updated_by')->nullable();
            }
        );

        // -- UPDATE --
        $this->tableUpdate(
            function (Blueprint $table) {
                if (! $this->hasColumn('created_by')) {
                    $table->string('created_by')->nullable();
                }
                if (! $this->hasColumn('updated_by')) {
                    $table->string('updated_by')->nullable();
                }
                // -------- Index -----------------
<<<<<<< HEAD
                /*
=======
>>>>>>> a07a1ff (.)
                if(!$this->hasIndex('area_id')  ){
                    $table->index('area_id');
                }
                if(!$this->hasIndex('perm_user_id')  ){
                    $table->index('perm_user_id');
                }
<<<<<<< HEAD
                */
            }
        );
    }
}
=======
            }
        );
    }
}
>>>>>>> a07a1ff (.)
