<?php

namespace Modules\LU\Models;

//use Illuminate\Database\Eloquent\Model;
//use Laravel\Scout\Searchable;
//use Modules\Xot\Traits\Updater;

/**
 * Modules\LU\Models\Application
 *
 * @property int $application_id
 * @property string $application_define_name
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string|null $created_by
 * @property string|null $updated_by
 * @method static \Illuminate\Database\Eloquent\Builder|Application newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Application newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Application query()
 * @method static \Illuminate\Database\Eloquent\Builder|Application whereApplicationDefineName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Application whereApplicationId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Application whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Application whereCreatedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Application whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Application whereUpdatedBy($value)
 * @mixin \Eloquent
 */
class Application extends BaseModel {
    //use Updater;
    //use Searchable;
    //protected $connection = 'liveuser_general'; // this will use the specified database conneciton
    /**
     * @var string
     */
    protected $table = 'liveuser_applications';
    /**
     * @var string
     */
    protected $primaryKey = 'application_id';
    /**
     * @var string[]
     */
    protected $fillable = ['application_id', 'application_define_name'];

}
