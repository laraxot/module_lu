<?php

declare(strict_types=1);

namespace Modules\LU\Datas;

use Spatie\LaravelData\Data;
use Spatie\LaravelData\DataCollection;

class RoleData extends Data {
    public string $name;
    /**
     * Summary of permissions.
     *
     * @var DataCollection<PermissionData>
     */
    public DataCollection $permissions;
}
