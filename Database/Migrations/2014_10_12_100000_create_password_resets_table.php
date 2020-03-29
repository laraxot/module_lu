<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
//---- models ---
use Modules\LU\Models\PasswordReset as MyModel;

class CreatePasswordResetsTable extends Migration {
    //protected $table = 'password_resets';
    protected $connection = 'liveuser_general';

    public function getTable() {
        return with(new MyModel())->getTable();
    }

    /**
     * Run the migrations.
     */
    public function up() {
        if (! Schema::connection('liveuser_general')->hasTable($this->getTable())) {
            Schema::connection('liveuser_general')->create($this->getTable(), function (Blueprint $table) {
                //$table->increments('id');
                //with index  SQLSTATE[42000]: Syntax error or access violation: 1071 Specified key was too long; max key length is 767 bytes
                //=> so i add ID increments, remember to test it
                //$table->string('email');
                //$table->string('email')->index();
                $table->string('email', 191)->index();
                $table->string('token');
                //$table->rememberToken();
                $table->timestamps();
                $table->string('created_by')->nullable();
                $table->string('updated_by')->nullable();
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down() {
        Schema::connection('liveuser_general')->dropIfExists($this->getTable());
    }
}
