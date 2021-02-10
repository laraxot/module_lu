<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
//--- models --
use Modules\LU\Models\AreaAdminArea as MyModel;

/**
 * Class CreateLiveuserAreaAdminAreasTable
 */
class CreateLiveuserAreaAdminAreasTable extends Migration {
    /**
     * @return string
     */
    public function getTable():string {
        return with(new MyModel())->getTable();
    }

    /**
     * @return \Illuminate\Database\Schema\Builder
     */
    public function getConn() {
        //return with(new MyModel())->getConnection();
        return Schema::connection('liveuser_general');
    }

    /**
     * Run the migrations.
   * @return void
     */
    public function up() {
        if (! $this->getConn()->hasTable($this->getTable())) {
            $this->getConn()->create($this->getTable(), function (Blueprint $table) {
                $table->increments('id');
                $table->integer('area_id')->unsigned()->default(0)->nullable();
                $table->integer('perm_user_id')->unsigned()->default(0)->nullable();

                $table->timestamps();
                $table->string('created_by')->nullable();
                $table->string('updated_by')->nullable();
            });
        }
        $this->getConn()->table($this->getTable(), function (Blueprint $table) {
            if (! $this->getConn()->hasColumn($this->getTable(), 'created_by')) {
                $table->string('created_by')->nullable();
            }
            if (! $this->getConn()->hasColumn($this->getTable(), 'updated_by')) {
                $table->string('updated_by')->nullable();
            }
        });
    }

    /**
     * Reverse the migrations.
     * @return void
*/
    public function down() {
        $this->getConn()->dropIfExists($this->getTable());
    }
}
