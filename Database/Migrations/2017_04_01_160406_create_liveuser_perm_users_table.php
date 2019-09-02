<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

//---- models ---
use Modules\LU\Models\PermUser as MyModel;

class CreateLiveuserPermUsersTable extends Migration{
    //protected $table = 'liveuser_perm_users';
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
     */
    public function down(){
        Schema::connection('liveuser_general')->drop($this->getTable());
    }
}
