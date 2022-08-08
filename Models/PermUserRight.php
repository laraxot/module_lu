<?php

declare(strict_types=1);

namespace Modules\LU\Models;

/**
 * Modules\LU\Models\PermUserRight
 *
 * @method static \Modules\LU\Database\Factories\PermUserRightFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|PermUserRight newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PermUserRight newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PermUserRight query()
 * @mixin \Eloquent
 */
class PermUserRight extends BasePivot {
    /**
     * @var string[]
     */
    protected $fillable = ['perm_user_id', 'right_id', 'right_level'];
}
