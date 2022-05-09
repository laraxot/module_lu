<?php

declare(strict_types=1);

use Illuminate\Database\Schema\Blueprint;
//---- models ---
use Modules\Xot\Database\Migrations\XotBaseMigration;

/**
 * Class CreateLiveuserUsersTable.
 */
class CreateUsersTable extends XotBaseMigration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        //-- CREATE --
        $this->tableCreate(
            function (Blueprint $table) {
                //$table->increments('user_id');
                $table->increments('id');
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
            }
        );

        //-- UPDATE --
        $this->tableUpdate(
            function (Blueprint $table) {
                if (! $this->hasColumn('first_name')) {
                    $table->string('first_name')->nullable();
                }
                if (! $this->hasColumn('last_name')) {
                    $table->string('last_name')->nullable();
                }
                if ($this->hasColumn('auth_user_id')) {
                    $table->renameColumn('auth_user_id', 'id');
                }
                /* -- using passport
                if (! $this->hasColumn('api_token')) {
                    $table->text('api_token')->nullable();
                }
                */
                if (! $this->hasColumn('two_factor_secret')) {
                    $table->text('two_factor_secret')
                        ->after('password')
                        ->nullable();

                    $table->text('two_factor_recovery_codes')
                        ->after('two_factor_secret')
                        ->nullable();
                }
            }
        );
    }

    //end up

    //end down
}
