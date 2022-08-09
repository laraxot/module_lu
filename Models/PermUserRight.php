<?php

declare(strict_types=1);

namespace Modules\LU\Models;

class PermUserRight extends BasePivot {
    /**
     * @var string[]
     */
    protected $fillable = ['perm_user_id', 'right_id', 'right_level'];
}
