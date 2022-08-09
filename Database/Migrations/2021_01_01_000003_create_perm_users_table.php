<?php

declare(strict_types=1);

use Illuminate\Database\Schema\Blueprint;
// ---- models ---
use Modules\Xot\Database\Migrations\XotBaseMigration;

/**
 * Class CreateLiveuserPermUsersTable.
 */
class CreatePermUsersTable extends XotBaseMigration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        // -- CREATE --
        $this->tableCreate(
            function (Blueprint $table) {
                // $table->increments('perm_user_id');
                $table->increments('id');
                $table->integer('user_id')->default(0);
                $table->integer('perm_type')->unsigned()->nullable();
                $table->string('auth_container_name', 32)->default('');

                $table->timestamps();
                $table->string('created_by')->nullable();
                $table->string('updated_by')->nullable();
            }
        );
        // -- UPDATE --
        $this->tableUpdate(
            function (Blueprint $table) {
                if ($this->hasColumn('auth_user_id') && ! $this->hasColumn('user_id')) {
                    $table->renameColumn('auth_user_id', 'user_id');
                } elseif (! $this->hasColumn('auth_user_id') && ! $this->hasColumn('user_id')) {
                    $table->integer('user_id')->default(0);
                }
                if ($this->hasColumn('perm_user_id') && ! $this->hasColumn('id')) {
                    $table->renameColumn('perm_user_id', 'id');
                }
<<<<<<< HEAD
                /*
=======
>>>>>>> 91cddea (.)
                // -------- Index -----------------
                if (! $this->hasIndex('user_id') && $this->hasColumn('user_id')) {
                    $table->index('user_id');
                }
<<<<<<< HEAD
                */
            }
        );
    }
}
=======
            }
        );
    }
}
>>>>>>> 91cddea (.)
