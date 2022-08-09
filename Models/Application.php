<?php

declare(strict_types=1);

namespace Modules\LU\Models;

/**
 * Modules\LU\Models\Application.
 *
<<<<<<< HEAD
 * @property int                             $id
 * @property string                          $application_define_name
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string|null                     $created_by
 * @property string|null                     $updated_by
 *
=======
 * @property int $id
 * @property string $application_define_name
<<<<<<< HEAD
>>>>>>> c36e7a4 (.)
=======
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string|null $created_by
 * @property string|null $updated_by
>>>>>>> 4dbe463 (.)
 * @method static \Modules\LU\Database\Factories\ApplicationFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|Application newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Application newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Application query()
 * @method static \Illuminate\Database\Eloquent\Builder|Application whereApplicationDefineName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Application whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Application whereCreatedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Application whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Application whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Application whereUpdatedBy($value)
 * @mixin \Eloquent
 */
class Application extends BaseModel {
    /**
     * @var string[]
     */
    protected $fillable = ['id', 'application_define_name'];
}
