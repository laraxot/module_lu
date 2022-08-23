<?php

declare(strict_types=1);

namespace Modules\LU\Models;

/**
 * Modules\LU\Models\ModelHasRole
 *
 * @method static \Modules\LU\Database\Factories\ModelHasRoleFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|ModelHasRole newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ModelHasRole newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ModelHasRole query()
 * @mixin \Eloquent
 */
class ModelHasRole extends BaseMorphPivot {
    protected $fillable = ['role_id', 'model_type', 'model_id'];
}
