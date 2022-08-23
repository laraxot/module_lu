<?php

declare(strict_types=1);

namespace Modules\LU\Models;

/**
 * Modules\LU\Models\ModelHasPermission
 *
 * @method static \Modules\LU\Database\Factories\ModelHasPermissionFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|ModelHasPermission newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ModelHasPermission newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ModelHasPermission query()
 * @mixin \Eloquent
 */
class ModelHasPermission extends BaseMorphPivot {
    protected $fillable = ['permission_id', 'model_type', 'model_id'];
}
