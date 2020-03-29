<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
//---- models ---
use Modules\LU\Models\Area as MyModel;

class CreateLiveuserAreasTable extends Migration {
    //protected $table = 'liveuser_areas';
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
                $table->increments('area_id');
                $table->integer('application_id')->unsigned()->default(0);
                $table->string('area_define_name', 32)->default('');
                $table->string('db', 32)->default('');
                $table->string('img', 250)->default('0');
                $table->string('icons', 250)->default('0');
                $table->integer('ordine')->default(0);
                $table->string('controller_path')->default('0');

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
