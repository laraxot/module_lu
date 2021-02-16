<<<<<<< HEAD
<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
//--- models --
use Modules\Xot\Database\Migrations\XotBaseMigration;

/**
 * Class CreateSocialProvidersTable
 */
class CreateSocialProvidersTable extends XotBaseMigration {
    /**
     * Run the migrations.
   * @return void
     */
    public function up() {
        //-- CREATE --
        if (! $this->tableExists()) {
            $this->getConn()->create(
                $this->getTable(),
                function (Blueprint $table) {
                    $table->increments('id');
                    $table->integer('user_id')->nullable();
                    //unsigned()->references('auth_user_id')->on('liveuser_users');
                    $table->string('provider_id')->nullable();
                    $table->string('provider')->nullable();
                    $table->string('token')->nullable();

                    $table->timestamps();
                    $table->string('created_by')->nullable();
                    $table->string('updated_by')->nullable();
                }
            );
        }
        /*
        Schema::connection('liveuser_general')->table($this->getTable(), function (Blueprint $table) {
            if (! Schema::connection('liveuser_general')->hasColumn($this->getTable(), 'token')) {
                $table->string('token')->nullable();
            }
        });
        */
        //-- UPDATE --
        $this->getConn()->table(
            $this->getTable(),
            function (Blueprint $table) {
                if (! $this->hasColumn('name')) {
                    $table->string('name')->after('token')->nullable();
                    $table->string('email')->after('token')->nullable();
                    $table->string('avatar')->after('token')->nullable();
                }
            }
        );
    }

    /*
     * Reverse the migrations.
     */
    /*
    public function down() {
        Schema::connection('liveuser_general')->dropIfExists($this->getTable());
    }
    */
}
=======
<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
//--- models --
use Modules\Xot\Database\Migrations\XotBaseMigration;

/**
 * Class CreateSocialProvidersTable
 */
class CreateSocialProvidersTable extends XotBaseMigration {
    /**
     * Run the migrations.
   * @return void
     */
    public function up() {
        //-- CREATE --
        if (! $this->tableExists()) {
            $this->getConn()->create(
                $this->getTable(),
                function (Blueprint $table) {
                    $table->increments('id');
                    $table->integer('user_id')->nullable();
                    //unsigned()->references('auth_user_id')->on('liveuser_users');
                    $table->string('provider_id')->nullable();
                    $table->string('provider')->nullable();
                    $table->string('token')->nullable();

                    $table->timestamps();
                    $table->string('created_by')->nullable();
                    $table->string('updated_by')->nullable();
                }
            );
        }
        /*
        Schema::connection('liveuser_general')->table($this->getTable(), function (Blueprint $table) {
            if (! Schema::connection('liveuser_general')->hasColumn($this->getTable(), 'token')) {
                $table->string('token')->nullable();
            }
        });
        */
        //-- UPDATE --
        $this->getConn()->table(
            $this->getTable(),
            function (Blueprint $table) {
                if (! $this->hasColumn('name')) {
                    $table->string('name')->after('token')->nullable();
                    $table->string('email')->after('token')->nullable();
                    $table->string('avatar')->after('token')->nullable();
                }
            }
        );
    }

    /*
     * Reverse the migrations.
     */
    /*
    public function down() {
        Schema::connection('liveuser_general')->dropIfExists($this->getTable());
    }
    */
}
>>>>>>> ae14cf9 (first)
