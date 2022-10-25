<?php

declare(strict_types=1);

namespace Modules\LU\Models;

/**
 * Modules\LU\Models\Right.
 *
 * @property int $id
 * @property int $area_id
 * @property string $right_define_name
 * @property string $has_implied
 * @property string $has_level
 * @method static \Modules\LU\Database\Factories\RightFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|Right newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Right newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Right query()
 * @method static \Illuminate\Database\Eloquent\Builder|Right whereAreaId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Right whereHasImplied($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Right whereHasLevel($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Right whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Right whereRightDefineName($value)
 * @mixin \Eloquent
 */
class Right extends BaseModel {
    /**
     * @var string[]
     */
    protected $fillable = ['id', 'area_id', 'right_define_name', 'has_implied', 'has_level'];
}
