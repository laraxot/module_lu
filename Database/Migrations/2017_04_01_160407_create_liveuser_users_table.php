<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

//---- models ---
use Modules\LU\Models\User as MyModel;



class CreateLiveuserUsersTable extends Migration {
    //protected $table = 'liveuser_users';
    protected $connection = 'liveuser_general'; 

    public function getTable(){
        return with(new MyModel())->getTable();
    }
    /**
     * Run the migrations.
     */
    public function up() {
        if (!Schema::connection('liveuser_general')->hasTable($this->getTable())) {
            Schema::connection('liveuser_general')->create($this->getTable(), function (Blueprint $table) {
                $table->increments('auth_user_id');
                $table->string('handle', 32)->nullable()->default('')->index('handle');
                $table->string('passwd', 32)->nullable()->default('');
                $table->dateTime('lastlogin')->nullable();
                $table->integer('owner_user_id')->unsigned()->nullable();
                $table->integer('owner_group_id')->unsigned()->nullable();
                $table->char('is_active', 1)->nullable()->default('N');
                $table->tinyInteger('enable')->nullable();
                $table->string('email', 250)->nullable();
                $table->string('first_name')->nullable();
                $table->string('last_name')->nullable();
                $table->integer('ente')->unsigned()->nullable()->index('i_ente');
                $table->integer('matr')->unsigned()->nullable()->index('i_matr');
                $table->string('password', 40)->nullable()->default('');
                $table->string('hash', 40)->nullable()->default('');
                $table->string('activation_code', 40)->nullable()->default('0');
                $table->string('forgotten_password_code', 40)->nullable()->default('0');
                $table->datetime('last_login_at')->nullable();
                $table->string('last_login_ip')->nullable();
                $table->string('token_check')->nullable();
                $table->boolean('is_verified')->nullable();
                $table->rememberToken();
                $table->timestamp('email_verified_at')->nullable();
                
                $table->timestamps();
                $table->string('created_by')->nullable();
                $table->string('updated_by')->nullable();

            });
        }
        Schema::connection('liveuser_general')->table($this->getTable(), function (Blueprint $table) {
            if (!Schema::connection('liveuser_general')->hasColumn($this->getTable(), 'email_verified_at')) {
                /*
                */
            }
        });
    }//end up

    /**
     * Reverse the migrations.
     */
    public function down(){
        Schema::connection('liveuser_general')->drop($this->getTable());
    }//end down
}
