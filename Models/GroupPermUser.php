<?php

declare(strict_types=1);

namespace Modules\LU\Models;

use Illuminate\Database\Eloquent\Relations\HasOne;

/**
 * Modules\LU\Models\GroupPermUser
 *
 * @property-read \Modules\LU\Models\Group|null $group
 * @method static \Modules\LU\Database\Factories\GroupPermUserFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|GroupPermUser newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|GroupPermUser newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|GroupPermUser query()
 * @mixin \Eloquent
 */
class GroupPermUser extends BasePivot {
    /**
     * @var string[]
     */
    protected $fillable = ['perm_user_id', 'group_id'];

    // ------------- RELATIONSHIP ------------------------

    /**
     * Undocumented function.
     */
    public function group(): HasOne {
        return $this->hasOne(Group::class);
    }

    // ----------------------------------------
}// end class GroupPermUser
