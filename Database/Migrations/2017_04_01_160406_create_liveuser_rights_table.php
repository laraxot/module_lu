<?php

declare(strict_types=1);

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
//---- models ---
use Modules\LU\Models\Right as MyModel;

/**
 * Class CreateLiveuserRightsTable.
 */
class CreateLiveuserRightsTable extends Migration {
    //protected $table = 'liveuser_rights';
    /**
     * @var string
     */
    protected $connection = 'liveuser_general';

    public function getTable(): string {
        return with(new MyModel())->getTable();
    }

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        if (! Schema::connection('liveuser_general')->hasTable($this->getTable())) {
            Schema::connection('liveuser_general')->create($this->getTable(), function (Blueprint $table) {
                $table->increments('right_id');
                $table->integer('area_id')->unsigned()->default(0)->index('rights_area_id');
                $table->string('right_define_name', 150);
                $table->char('has_implied', 1)->default('N');
                $table->char('has_level', 1)->default('N');
                $table->unique(['area_id', 'right_define_name'], 'right_define_name');

                $table->timestamps();
                $table->string('created_by')->nullable();
                $table->string('updated_by')->nullable();
            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::connection('liveuser_general')->drop($this->getTable());
    }
}