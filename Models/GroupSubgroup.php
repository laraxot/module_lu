<?php

declare(strict_types=1);

namespace Modules\LU\Models;

use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * Modules\LU\Models\GroupSubgroup.
 *
 * @property int $group_id
 * @property int $subgroup_id
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Modules\LU\Models\GroupPermUser> $groupPermUsers
 * @property-read int|null $group_perm_users_count
 * @method static \Modules\LU\Database\Factories\GroupSubgroupFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|GroupSubgroup newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|GroupSubgroup newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|GroupSubgroup query()
 * @method static \Illuminate\Database\Eloquent\Builder|GroupSubgroup whereGroupId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GroupSubgroup whereSubgroupId($value)
 * @mixin \Eloquent
 */
class GroupSubgroup extends BaseModel
{
    /**
     * @var string[]
     */
    protected $fillable = ['group_id', 'subgroup_id'];

    /**
     * Undocumented function.
     */
    public function groupPermUsers(): HasMany
    {
        return $this->hasMany(GroupPermUser::class);
    }

    // ---------------------------------------------------------------------------
}
