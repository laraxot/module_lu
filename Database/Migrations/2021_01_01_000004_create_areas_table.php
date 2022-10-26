<?php

declare(strict_types=1);

use Illuminate\Database\Schema\Blueprint;
// ---- models ---
use Modules\Xot\Database\Migrations\XotBaseMigration;

/**
 * Class CreateLiveuserAreasTable.
 */
class CreateAreasTable extends XotBaseMigration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // -- CREATE --
        $this->tableCreate(
            function (Blueprint $table) {
                // $table->increments('area_id');
                $table->increments('id');
                $table->integer('application_id')->unsigned()->default(0);
                $table->string('area_define_name', 32)->default('');
                $table->string('db', 32)->default('');
                $table->string('img', 250)->default('0');
                $table->string('icons', 250)->default('0');
                $table->integer('ordine')->default(0);
                $table->string('controller_path')->default('0');

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
                if ($this->hasColumn('area_id') && ! $this->hasColumn('id')) {
                    $table->renameColumn('area_id', 'id');
                }
                if (! $this->hasColumn('order_column')) {
                    $table->unsignedInteger('order_column')->nullable()->index();
                }
            }
        );
    }
}
