<?php

declare(strict_types=1);

namespace Modules\LU\Models;

// use Modules\Xot\Models\XotBaseModel;

/**
 * Modules\LU\Models\RightImplied.
 *
 * @property int                             $id
 * @property int                             $right_id
 * @property int                             $implied_right_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string|null                     $created_by
 * @property string|null                     $updated_by
 * @method static \Modules\LU\Database\Factories\RightImpliedFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|RightImplied newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|RightImplied newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|RightImplied query()
 * @method static \Illuminate\Database\Eloquent\Builder|RightImplied whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RightImplied whereCreatedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RightImplied whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RightImplied whereImpliedRightId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RightImplied whereRightId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RightImplied whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RightImplied whereUpdatedBy($value)
 * @mixin \Eloquent
 */
class RightImplied extends BaseModel {
    // protected $connection = 'liveuser_general'; // this will use the specified database conneciton
    /**
     * @var string
     */
    // protected $table = 'liveuser_right_implied';
    /**
     * @var string
     */
    protected $primaryKey = 'id';
    /**
     * @var string[]
     */
    protected $fillable = ['right_id', 'implied_right_id'];
}
