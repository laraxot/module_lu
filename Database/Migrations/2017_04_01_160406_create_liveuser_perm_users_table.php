<<<<<<< HEAD
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
//---- models ---
use Modules\LU\Models\PermUser as MyModel;

/**
 * Class CreateLiveuserPermUsersTable
 */
class CreateLiveuserPermUsersTable extends Migration {
    //protected $table = 'liveuser_perm_users';
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
                $table->increments('perm_user_id');
                $table->integer('auth_user_id')->default(0);
                $table->integer('perm_type')->unsigned()->nullable();
                $table->string('auth_container_name', 32)->default('');

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
use Modules\LU\Models\PermUser as MyModel;

/**
 * Class CreateLiveuserPermUsersTable.
 */
class CreateLiveuserPermUsersTable extends Migration {
    //protected $table = 'liveuser_perm_users';
    /**
     * @var string
     */
    protected $connection = 'liveuser_general';

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
                $table->increments('perm_user_id');
                $table->integer('auth_user_id')->default(0);
                $table->integer('perm_type')->unsigned()->nullable();
                $table->string('auth_container_name', 32)->default('');

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
