<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

//---- models ---
use Modules\LU\Models\Application as MyModel;

class CreateLiveuserApplicationsTable extends Migration{
    //protected $table = 'liveuser_applications';
    protected $connection = 'liveuser_general'; 

    public function getTable(){
        return with(new MyModel())->getTable();
    }

    /**
     * Run the migrations.
     */
    public function up(){
        if (!Schema::connection('liveuser_general')->hasTable($this->getTable())) {
            Schema::connection('liveuser_general')->create($this->getTable(), function (Blueprint $table) {
                $table->increments('application_id');
                $table->string('application_define_name', 32)->default('')->unique('application_define_name');

                $table->timestamps();
                $table->string('created_by')->nullable();
                $table->string('updated_by')->nullable();
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(){
        Schema::connection('liveuser_general')->dropIfExists($this->getTable());
    }
}
