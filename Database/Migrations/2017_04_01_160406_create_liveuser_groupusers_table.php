<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
//---- models ---
use Modules\LU\Models\GroupUser as MyModel;

class CreateLiveuserGroupusersTable extends Migration {
    //protected $table = 'liveuser_groupusers';
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
                $table->increments('id');
                $table->integer('perm_user_id')->unsigned()->default(0)->index('perm_user_id');
                $table->integer('group_id')->unsigned()->default(0)->index('group_id');
                //$table->primary(['group_id','perm_user_id']); //meglio mettere id, piu' veloce da far mangiare al crud
                $table->timestamps();
                $table->string('created_by')->nullable();
                $table->string('updated_by')->nullable();
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down() {
        Schema::connection('liveuser_general')->drop($this->getTable());
    }
}
