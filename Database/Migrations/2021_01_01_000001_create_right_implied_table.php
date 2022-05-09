<?php

declare(strict_types=1);

use Illuminate\Database\Schema\Blueprint;
//---- models ---
use Modules\Xot\Database\Migrations\XotBaseMigration;

/**
 * Class CreateLiveuserRightImpliedTable.
 */
class CreateRightImpliedTable extends XotBaseMigration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //-- senza il prefix !
        //$old_table = 'area_admin_areas';
        //if ($this->getConn()->hasTable($old_table)) {
        //    $this->getConn()->rename($old_table, $this->getTable());
        //}
        //-- CREATE --
        $this->tableCreate(
            function (Blueprint $table) {
                $table->increments('id');
                $table->integer('right_id')->unsigned()->default(0)->index('right_id');
                $table->integer('implied_right_id')->unsigned()->default(0)->index('implied_right_id');
                //$table->primary(['right_id','implied_right_id']); //meglio usare id, piu' veloce da far mangiare al crud
                $table->timestamps();
                $table->string('created_by')->nullable();
                $table->string('updated_by')->nullable();
            }
        );
        //-- UPDATE --
        $this->tableUpdate(
            function (Blueprint $table) {
                if ($this->hasColumn('auth_user_id') && ! $this->hasColumn('user_id')) {
                    $table->renameColumn('auth_user_id', 'user_id');
                }
            }
        );
    }
}
