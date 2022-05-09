<?php

declare(strict_types=1);

use Illuminate\Database\Schema\Blueprint;
//---- models ---
use Modules\Xot\Database\Migrations\XotBaseMigration;

/**
 * Class CreateLiveuserRightsTable.
 */
class CreateRightsTable extends XotBaseMigration
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
                //$table->increments('right_id');
                $table->increments('id');
                $table->integer('area_id')->unsigned()->default(0)->index('rights_area_id');
                $table->string('right_define_name', 150);
                $table->char('has_implied', 1)->default('N');
                $table->char('has_level', 1)->default('N');
                $table->unique(['area_id', 'right_define_name'], 'right_define_name');

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
                if ($this->hasColumn('right_id') && ! $this->hasColumn('id')) {
                    $table->renameColumn('right_id', 'id');
                }
            }
        );
    }
}
