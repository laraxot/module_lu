<<<<<<< HEAD
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
//---- models ---
use Modules\LU\Models\Application as MyModel;

/**
 * Class CreateLiveuserApplicationsTable
 */
class CreateLiveuserApplicationsTable extends Migration {
    //protected $table = 'liveuser_applications';
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
//---- models ---
use Modules\LU\Models\Application as MyModel;

/**
 * Class CreateLiveuserApplicationsTable
 */
class CreateLiveuserApplicationsTable extends Migration {
    //protected $table = 'liveuser_applications';
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
     * @return void
*/
    public function down() {
        Schema::connection('liveuser_general')->dropIfExists($this->getTable());
    }
}
>>>>>>> ae14cf9 (first)
