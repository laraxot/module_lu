<?php

declare(strict_types=1);

namespace Modules\LU\Models;

/**
 * Modules\LU\Models\RoleHasPermission
 *
 * @method static \Modules\LU\Database\Factories\RoleHasPermissionFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|RoleHasPermission newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|RoleHasPermission newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|RoleHasPermission query()
 * @mixin \Eloquent
 */
class RoleHasPermission extends BasePivot {
    protected $fillable=['permission_id','role_id'];

}
