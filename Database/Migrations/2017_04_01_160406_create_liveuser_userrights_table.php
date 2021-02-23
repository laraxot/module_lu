<<<<<<< HEAD
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
//---- models ---
use Modules\LU\Models\UserRight as MyModel;

/**
 * Class CreateLiveuserUserrightsTable
 */
class CreateLiveuserUserrightsTable extends Migration {
    //protected $table = 'liveuser_userrights';
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
     * @return void
*/
    public function down() {
        Schema::connection('liveuser_general')->dropIfExists($this->getTable());
    }
}
=======
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
//---- models ---
use Modules\LU\Models\UserRight as MyModel;

/**
 * Class CreateLiveuserUserrightsTable
 */
class CreateLiveuserUserrightsTable extends Migration {
    //protected $table = 'liveuser_userrights';
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
     * @return void
*/
    public function down() {
        Schema::connection('liveuser_general')->dropIfExists($this->getTable());
    }
}
>>>>>>> 3c191b8b6e72c4241b48547e7460883dfd14b26c
