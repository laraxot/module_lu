<?php

declare(strict_types=1);

use Illuminate\Database\Schema\Blueprint;
// ---- models ---
use Modules\Xot\Database\Migrations\XotBaseMigration;

/**
 * Class CreateInvitationsTable.
 */
class CreateInvitationsTable extends XotBaseMigration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // $old_table = 'groupusers';
        // if ($this->getConn()->hasTable($old_table)) {
        //    $this->getConn()->rename($old_table, $this->getTable());
        // }
        // -- CREATE --
        $this->tableCreate(
            function (Blueprint $table) {
                $table->increments('id');
                $table->string('email', 100)->unique();
                $table->string('invitation_token', 32)->unique()->nullable();
                $table->timestamp('registered_at')->nullable();

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
                }
            }
        );
    }
}
