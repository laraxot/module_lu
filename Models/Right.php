<?php

declare(strict_types=1);

namespace Modules\LU\Models;

/**
 * Modules\LU\Models\Right.
 *
<<<<<<< HEAD
 * @property int                             $id
 * @property int                             $area_id
 * @property string                          $right_define_name
 * @property string                          $has_implied
 * @property string                          $has_level
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string|null                     $created_by
 * @property string|null                     $updated_by
 *
=======
 * @property int $id
 * @property int $area_id
 * @property string $right_define_name
 * @property string $has_implied
 * @property string $has_level
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
>>>>>>> c36e7a4 (.)
=======
=======
>>>>>>> 4edd08c (rebase)
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string|null $created_by
 * @property string|null $updated_by
<<<<<<< HEAD
>>>>>>> 4dbe463 (.)
=======
>>>>>>> 8dc2218 (rebase)
=======
>>>>>>> 4edd08c (rebase)
 * @method static \Modules\LU\Database\Factories\RightFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|Right newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Right newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Right query()
 * @method static \Illuminate\Database\Eloquent\Builder|Right whereAreaId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Right whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Right whereCreatedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Right whereHasImplied($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Right whereHasLevel($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Right whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Right whereRightDefineName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Right whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Right whereUpdatedBy($value)
 * @mixin \Eloquent
 */
class Right extends BaseModel {
    /**
     * @var string[]
     */
    protected $fillable = ['id', 'area_id', 'right_define_name', 'has_implied', 'has_level'];
}
