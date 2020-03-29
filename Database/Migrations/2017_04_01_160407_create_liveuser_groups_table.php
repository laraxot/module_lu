<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
//--- models --
use Modules\LU\Models\Group as MyModel;

class CreateLiveuserGroupsTable extends Migration {
    //protected $table = '';
    protected $connection = 'liveuser_general';

    public function getTable() {
        return with(new MyModel())->getTable();
    }

    /**
     * Run the migrations.
     */
    public function up() {
        if (! Schema::connection('liveuser_general')->hasTable($this->getTable())) {
            Schema::connection('liveuser_general')->create($this->getTable(), function (Blueprint $table) {
                $table->increments('group_id');
                $table->integer('group_type')->unsigned()->nullable()->default(1);
                $table->string('group_define_name', 150)->nullable()->unique('group_define_name');
                $table->integer('owner_user_id')->unsigned()->nullable();
                $table->integer('owner_group_id')->unsigned()->nullable();
                $table->char('is_active', 1)->default('N');

                $table->timestamps();
                $table->string('created_by')->nullable();
                $table->string('updated_by')->nullable();
            });
        }
        //------ ADD
        Schema::connection('liveuser_general')->table($this->getTable(), function (Blueprint $table) {
            if (! Schema::connection('liveuser_general')->hasColumn($this->getTable(), 'created_by')) {
                $table->string('created_by')->nullable();
            }
            if (! Schema::connection('liveuser_general')->hasColumn($this->getTable(), 'updated_by')) {
                $table->string('updated_by')->nullable();
            }
            if (! Schema::connection('liveuser_general')->hasColumn($this->getTable(), 'updated_at')
                && ! Schema::connection('liveuser_general')->hasColumn($this->getTable(), 'created_at')) {
                $table->timestamps();
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down() {
        Schema::connection('liveuser_general')->dropIfExists($this->getTable());
    }
}
