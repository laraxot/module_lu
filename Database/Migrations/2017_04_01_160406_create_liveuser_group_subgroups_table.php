<<<<<<< HEAD
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
//---- models ---
use Modules\LU\Models\GroupSubgroup as MyModel;

/**
 * Class CreateLiveuserGroupSubgroupsTable
 */
class CreateLiveuserGroupSubgroupsTable extends Migration {
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
        if (! Schema::connection('liveuser_general')->hasTable($this->getTable())) {
            Schema::connection('liveuser_general')->create($this->getTable(), function (Blueprint $table) {
                $table->increments('id');
                $table->integer('group_id')->unsigned()->default(0)->index('group_id');
                $table->integer('subgroup_id')->unsigned()->default(0)->index('subgroup_id');
                //$table->primary(['group_id','subgroup_id']); //meglio usare id, piu' veloce per il crud
                $table->timestamps();
                $table->string('created_by')->nullable();
                $table->string('updated_by')->nullable();
            });
        }
    }

    /**
     * Reverse the migrations.
     * @return void
*/
    public function down() {
        Schema::connection('liveuser_general')->drop($this->getTable());
    }
}
=======
<?php

declare(strict_types=1);

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
//---- models ---
use Modules\LU\Models\GroupSubgroup as MyModel;

/**
 * Class CreateLiveuserGroupSubgroupsTable.
 */
class CreateLiveuserGroupSubgroupsTable extends Migration {
    public function getTable(): string {
        return with(new MyModel())->getTable();
    }

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        if (! Schema::connection('liveuser_general')->hasTable($this->getTable())) {
            Schema::connection('liveuser_general')->create($this->getTable(), function (Blueprint $table) {
                $table->increments('id');
                $table->integer('group_id')->unsigned()->default(0)->index('group_id');
                $table->integer('subgroup_id')->unsigned()->default(0)->index('subgroup_id');
                //$table->primary(['group_id','subgroup_id']); //meglio usare id, piu' veloce per il crud
                $table->timestamps();
                $table->string('created_by')->nullable();
                $table->string('updated_by')->nullable();
            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::connection('liveuser_general')->drop($this->getTable());
    }
}
>>>>>>> 3c191b8b6e72c4241b48547e7460883dfd14b26c
