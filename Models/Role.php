<?php

declare(strict_types=1);

namespace Modules\LU\Models;

use Spatie\Permission\Models\Role as SpatieRole;

/**
 * Modules\LU\Models\Role.
 */
class Role extends SpatieRole {
    protected $fillable = ['id', 'name', 'guard_name', 'created_at', 'updated_at'];
}
