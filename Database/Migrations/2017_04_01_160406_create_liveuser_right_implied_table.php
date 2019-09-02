<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

//---- models ---
use Modules\LU\Models\RightImplied as MyModel;

class CreateLiveuserRightImpliedTable extends Migration{
    //protected $table = 'liveuser_right_implied';
    protected $connection = 'liveuser_general';

    public function getTable(){
        return with(new MyModel())->getTable();
    }

    /**
     * Run the migrations.
     */
    public function up(){
        $schema = Schema::connection($this->connection);
        if (!$schema->hasTable($this->getTable())) {
            try {
                $schema->create($this->getTable(), function (Blueprint $table) {
                    $table->increments('id');
                    $table->integer('right_id')->unsigned()->default(0)->index('right_id');
                    $table->integer('implied_right_id')->unsigned()->default(0)->index('implied_right_id');
                    //$table->primary(['right_id','implied_right_id']); //meglio usare id, piu' veloce da far mangiare al crud
                    $table->timestamps();
                    $table->string('created_by')->nullable();
                    $table->string('updated_by')->nullable();
                });
            } catch (QueryException $e) {
                dd($e);
            }
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(){
        Schema::connection('liveuser_general')->dropIfExists($this->getTable());
    }
}
