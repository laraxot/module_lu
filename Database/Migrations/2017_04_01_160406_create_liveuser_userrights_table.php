<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
//---- models ---
use Modules\LU\Models\UserRight as MyModel;

class CreateLiveuserUserrightsTable extends Migration {
    //protected $table = 'liveuser_userrights';
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
                $table->integer('right_id')->unsigned()->default(0)->index('right_id');
                $table->boolean('right_level')->nullable()->default(3);
                //$table->primary(['right_id','perm_user_id']);/// meglio usare id, piu' veloce per il crud
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
        Schema::connection('liveuser_general')->dropIfExists($this->getTable());
    }
}
