<?php

declare(strict_types=1);

namespace Modules\LU\Models;

/**
 * Modules\LU\Models\ModelHasPermission.
 *
 * @property int $permission_id
 * @property string $model_type
 * @property int $model_id
 * @method static \Modules\LU\Database\Factories\ModelHasPermissionFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|ModelHasPermission newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ModelHasPermission newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ModelHasPermission query()
 * @method static \Illuminate\Database\Eloquent\Builder|ModelHasPermission whereModelId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ModelHasPermission whereModelType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ModelHasPermission wherePermissionId($value)
 * @mixin \Eloquent
 */
class ModelHasPermission extends BaseMorphPivot
{
    protected $fillable = ['permission_id', 'model_type', 'model_id'];
}
