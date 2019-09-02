<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

//--- models --
use Modules\LU\Models\SocialProvider as MyModel;

class CreateSocialProvidersTable extends Migration{
    
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
                $table->increments('id');
                $table->integer('user_id')->unsigned()->references('auth_user_id')->on('liveuser_users');
                $table->string('provider_id');
                $table->string('provider');
                $table->string('token');
                
                $table->timestamps();
                $table->string('created_by')->nullable();
                $table->string('updated_by')->nullable();
            });
        }
        Schema::connection('liveuser_general')->table($this->getTable(), function (Blueprint $table) {
            if (!Schema::connection('liveuser_general')->hasColumn($this->getTable(), 'token')) {
                $table->string('token')->nullable();
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(){
        Schema::connection('liveuser_general')->dropIfExists($this->getTable());
    }
}
