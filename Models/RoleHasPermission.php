<?php

declare(strict_types=1);

namespace Modules\LU\Models;

/**
 * Modules\LU\Models\RoleHasPermission.
 */
class RoleHasPermission extends BasePivot {
    protected $fillable=['permission_id','role_id'];

}
