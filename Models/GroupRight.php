<?php

declare(strict_types=1);

namespace Modules\LU\Models;

/**
 * Modules\LU\Models\GroupRight
 *
 * @method static \Modules\LU\Database\Factories\GroupRightFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|GroupRight newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|GroupRight newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|GroupRight query()
 * @mixin \Eloquent
 */
class GroupRight extends BasePivot {
    /**
     * @var string[]
     */
    protected $fillable = ['group_id', 'right_id', 'right_level'];
}
