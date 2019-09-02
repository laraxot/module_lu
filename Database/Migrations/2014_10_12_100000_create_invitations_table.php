<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

//---- models ---
use Modules\LU\Models\Invitation as MyModel;


class CreateInvitationsTable extends Migration {
    protected $connection = 'liveuser_general';

    public function getTable(){
        return with(new MyModel())->getTable();
    }

    /**
     * Run the migrations.
     */
    public function up()
    {
        if (!Schema::connection('liveuser_general')->hasTable($this->getTable() )) {
            Schema::connection('liveuser_general')->create($this->getTable(), function (Blueprint $table) {
                $table->increments('id');
                $table->string('email',100)->unique();
                $table->string('invitation_token', 32)->unique()->nullable();
                $table->timestamp('registered_at')->nullable();
                
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
        Schema::connection('liveuser_general')->dropIfExists($this->getTable());
    }
}
