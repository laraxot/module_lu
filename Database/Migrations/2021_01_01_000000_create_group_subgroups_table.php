<?php

declare(strict_types=1);

use Illuminate\Database\Schema\Blueprint;
//---- models ---
use Modules\Xot\Database\Migrations\XotBaseMigration;

/**
 * Class CreateLiveuserGroupSubgroupsTable.
 */
class CreateGroupSubgroupsTable extends XotBaseMigration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //-- CREATE --
        $this->tableCreate(
            function (Blueprint $table) {
                $table->increments('id');
                $table->integer('group_id')->unsigned()->default(0)->index('group_id');
                $table->integer('subgroup_id')->unsigned()->default(0)->index('subgroup_id');
                //$table->primary(['group_id','subgroup_id']); //meglio usare id, piu' veloce per il crud
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