<?php

declare(strict_types=1);

namespace Modules\LU\Models;

/**
 * Modules\LU\Models\Application
 *
<<<<<<< HEAD
=======
 * @property int $id
 * @property string $application_define_name
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
>>>>>>> 86b6983 (up)
=======
=======
>>>>>>> a49c283 (rebase)
=======
>>>>>>> b0e660e (rebase)
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string|null $created_by
 * @property string|null $updated_by
<<<<<<< HEAD
<<<<<<< HEAD
>>>>>>> 23a412e (.)
=======
>>>>>>> a49c283 (rebase)
=======
>>>>>>> df33cdc (up)
=======
>>>>>>> b0e660e (rebase)
 * @method static \Modules\LU\Database\Factories\ApplicationFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|Application newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Application newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Application query()
<<<<<<< HEAD
=======
 * @method static \Illuminate\Database\Eloquent\Builder|Application whereApplicationDefineName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Application whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Application whereCreatedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Application whereId($value)
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
>>>>>>> 86b6983 (up)
=======
 * @method static \Illuminate\Database\Eloquent\Builder|Application whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Application whereUpdatedBy($value)
>>>>>>> 23a412e (.)
=======
 * @method static \Illuminate\Database\Eloquent\Builder|Application whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Application whereUpdatedBy($value)
>>>>>>> a49c283 (rebase)
=======
>>>>>>> df33cdc (up)
=======
 * @method static \Illuminate\Database\Eloquent\Builder|Application whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Application whereUpdatedBy($value)
>>>>>>> b0e660e (rebase)
 * @mixin \Eloquent
 */
class Application extends BaseModel {
    /**
     * @var string[]
     */
    protected $fillable = ['id', 'application_define_name'];
}
