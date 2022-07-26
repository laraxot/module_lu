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
>>>>>>> 86b6983 (up)
 * @method static \Modules\LU\Database\Factories\ApplicationFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|Application newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Application newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Application query()
<<<<<<< HEAD
=======
 * @method static \Illuminate\Database\Eloquent\Builder|Application whereApplicationDefineName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Application whereId($value)
>>>>>>> 86b6983 (up)
 * @mixin \Eloquent
 */
class Application extends BaseModel {
    /**
     * @var string[]
     */
    protected $fillable = ['id', 'application_define_name'];
}
