<?php

declare(strict_types=1);

namespace Modules\LU\Models;

use Spatie\Permission\Models\Permission as SpatiePermission;

/**
 * Modules\LU\Models\Permission.
 */
class Permission extends SpatiePermission {
    protected $fillable=['id','name','guard_name','created_at','updated_at'];

}
