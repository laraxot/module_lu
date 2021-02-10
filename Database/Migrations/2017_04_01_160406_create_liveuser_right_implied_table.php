<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\QueryException;
use Illuminate\Database\Schema\Blueprint;
//---- models ---
use Illuminate\Support\Facades\Schema;
use Modules\LU\Models\RightImplied as MyModel;

/**
 * Class CreateLiveuserRightImpliedTable
 */
class CreateLiveuserRightImpliedTable extends Migration {
    //protected $table = 'liveuser_right_implied';
    /**
     * @var string
     */
    protected $connection = 'liveuser_general';

    /**
     * @return string
     */
    public function getTable():string {
        return with(new MyModel())->getTable();
    }

    /**
     * Run the migrations.
   * @return void
     */
    public function up() {
        $schema = Schema::connection($this->connection);
        if (! $schema->hasTable($this->getTable())) {
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
     * @return void
*/
    public function down() {
        Schema::connection('liveuser_general')->dropIfExists($this->getTable());
    }
}
