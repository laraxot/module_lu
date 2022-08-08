<?php

declare(strict_types=1);

namespace Modules\LU\Models;

// use Modules\Xot\Models\XotBaseModel;

/**
 * Modules\LU\Models\RightImplied
 *
 * @method static \Modules\LU\Database\Factories\RightImpliedFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|RightImplied newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|RightImplied newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|RightImplied query()
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
