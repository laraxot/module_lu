<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
//---- models ---
use Modules\LU\Models\GroupRight as MyModel;

class CreateLiveuserGrouprightsTable extends Migration {
    //protected $table = 'liveuser_grouprights';
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
                $table->integer('group_id')->unsigned()->default(0);
                $table->integer('right_id')->unsigned()->default(0);
                $table->boolean('right_level')->nullable()->default(3);
                //$table->primary(['group_id','right_id']);//meglio usare id..
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
