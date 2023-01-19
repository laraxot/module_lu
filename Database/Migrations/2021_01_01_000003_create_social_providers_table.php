<?php

declare(strict_types=1);

use Illuminate\Database\Schema\Blueprint;
// --- models --
use Modules\Xot\Database\Migrations\XotBaseMigration;

/**
 * Class CreateSocialProvidersTable.
 */
class CreateSocialProvidersTable extends XotBaseMigration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        // -- CREATE --
        $this->tableCreate(
            function (Blueprint $table) {
                $table->increments('id');
                $table->integer('user_id')->nullable();
                // unsigned()->references('user_id')->on('liveuser_users');
                $table->string('provider_id')->nullable();
                $table->string('provider')->nullable();
                $table->string('token')->nullable();

                $table->timestamps();
                $table->string('created_by')->nullable();
                $table->string('updated_by')->nullable();
            }
        );

        // -- UPDATE --
        $this->tableUpdate(
            function (Blueprint $table) {
                if (! $this->hasColumn('token')) {
                    $table->string('token')->nullable();
                }
                if (! $this->hasColumn('name')) {
                    $table->string('name')->nullable();
                    $table->string('email')->nullable();
                    $table->string('avatar')->nullable();
                }
                if (! $this->hasColumn('user_id')) {
                    $table->integer('user_id')->nullable();
                }
                if (! $this->hasColumn('provider_id')) {
                    $table->string('provider_id')->nullable();
                }
                if (! $this->hasColumn('provider')) {
                    $table->string('provider')->nullable();
                }
            }
        );
    }
}
