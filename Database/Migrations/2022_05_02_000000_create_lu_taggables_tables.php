<?php


use Illuminate\Database\Schema\Blueprint;
use Modules\Xot\Database\Migrations\XotBaseMigration;

class CreateLuTaggablesTables extends XotBaseMigration{
    protected ?string $model_class = \Modules\LU\Models\Taggable::class;
     /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        //-- CREATE --
        $this->tableCreate(
            function (Blueprint $table) {
                //SQLSTATE[HY000]: General error: 1215 Cannot add foreign key constraint (SQL: alter table `taggable` add constraint `taggable_tag_id_foreign` foreign key (`tag_id`) references `tags` (`id`) on delete cascade)
                $table->foreignId('tag_id');//->constrained()->cascadeOnDelete();
                $table->morphs('taggable');
                $table->unique(['tag_id', 'taggable_id', 'taggable_type']);
            }
        );
    }
}
