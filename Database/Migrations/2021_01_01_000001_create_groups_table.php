<?php

declare(strict_types=1);

use Illuminate\Database\Schema\Blueprint;
//--- models --
use Modules\Xot\Database\Migrations\XotBaseMigration;

/**
 * Class CreateLiveuserGroupsTable.
 */
class CreateGroupsTable extends XotBaseMigration
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
                //$table->increments('group_id');
                $table->integer('group_type')->unsigned()->nullable()->default(1);
                $table->string('group_define_name', 150)->nullable()->unique('group_define_name');
                $table->integer('owner_user_id')->unsigned()->nullable();
                $table->integer('owner_group_id')->unsigned()->nullable();
                $table->char('is_active', 1)->default('N');

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
                if ($this->hasColumn('group_id') && ! $this->hasColumn('id')) {
                    $table->renameColumn('group_id', 'id');
                }
            }
        );
    }
}
