<?php

declare(strict_types=1);

namespace Modules\LU\Models;

/**
 * Modules\LU\Models\ModelHasRole.
 *
 * @property int $role_id
 * @property string $model_type
 * @property int $model_id
 * @method static \Modules\LU\Database\Factories\ModelHasRoleFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|ModelHasRole newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ModelHasRole newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ModelHasRole query()
 * @method static \Illuminate\Database\Eloquent\Builder|ModelHasRole whereModelId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ModelHasRole whereModelType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ModelHasRole whereRoleId($value)
 * @mixin \Eloquent
 */
class ModelHasRole extends BaseMorphPivot
{
    protected $fillable = ['role_id', 'model_type', 'model_id'];
}
