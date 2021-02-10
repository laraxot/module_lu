<?php

namespace Modules\LU\Models;

//use Modules\Xot\Models\XotBaseModel;

/**
 * Modules\LU\Models\Right
 *
 * @property int $right_id
 * @property int $area_id
 * @property string $right_define_name
 * @property string $has_implied
 * @property string $has_level
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string|null $created_by
 * @property string|null $updated_by
 * @method static \Illuminate\Database\Eloquent\Builder|Right newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Right newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Right query()
 * @method static \Illuminate\Database\Eloquent\Builder|Right whereAreaId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Right whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Right whereCreatedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Right whereHasImplied($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Right whereHasLevel($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Right whereRightDefineName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Right whereRightId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Right whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Right whereUpdatedBy($value)
 * @mixin \Eloquent
 */
class Right extends BaseModel {
    //protected $connection = 'liveuser_general'; // this will use the specified database conneciton
    /**
     * @var string
     */
    protected $table = 'liveuser_rights';
    /**
     * @var string
     */
    protected $primaryKey = 'right_id';
    /**
     * @var string[]
     */
    protected $fillable = ['right_id', 'area_id', 'right_define_name', 'has_implied', 'has_level'];
}
