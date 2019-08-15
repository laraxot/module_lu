<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

//--- models --
use Modules\LU\Models\AreaAdminArea as MyModel;

    

class CreateLiveuserAreaAdminAreasTable extends Migration{
    
    public function getTable(){
        return with(new MyModel())->getTable();
    }
    public function getConn(){
        //return with(new MyModel())->getConnection();
        return Schema::connection('liveuser_general');
    }

    /**
     * Run the migrations.
     */
    public function up()
    {
        if (!$this->getConn()->hasTable($this->getTable())) {
            $this->getConn()->create($this->getTable(), function (Blueprint $table) {
                $table->increments('id');
                $table->integer('area_id')->unsigned()->default(0)->nullable();
                $table->integer('perm_user_id')->unsigned()->default(0)->nullable();
            });
        }
        $this->getConn()->table($this->getTable(), function (Blueprint $table) {
            if (!$this->getConn()->hasColumn($this->getTable(), 'created_by')) {
                $table->string('created_by')->nullable();
            }
            if (!$this->getConn()->hasColumn($this->getTable(), 'updated_by')) {
                $table->string('updated_by')->nullable();
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        $this->getConn()->drop($this->getTable());
    }
}
