<?php

declare(strict_types=1);

namespace Modules\LU\Models;

use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * Modules\LU\Models\GroupSubgroup
 *
<<<<<<< HEAD
<<<<<<< HEAD
=======
 * @property int $group_id
 * @property int $subgroup_id
>>>>>>> 86b6983 (up)
=======
 * @property int $id
 * @property int $group_id
 * @property int $subgroup_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string|null $created_by
 * @property string|null $updated_by
>>>>>>> 23a412e (.)
 * @property-read \Illuminate\Database\Eloquent\Collection|\Modules\LU\Models\GroupPermUser[] $groupPermUsers
 * @property-read int|null $group_perm_users_count
 * @method static \Modules\LU\Database\Factories\GroupSubgroupFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|GroupSubgroup newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|GroupSubgroup newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|GroupSubgroup query()
<<<<<<< HEAD
<<<<<<< HEAD
=======
=======
 * @method static \Illuminate\Database\Eloquent\Builder|GroupSubgroup whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GroupSubgroup whereCreatedBy($value)
>>>>>>> 23a412e (.)
 * @method static \Illuminate\Database\Eloquent\Builder|GroupSubgroup whereGroupId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GroupSubgroup whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GroupSubgroup whereSubgroupId($value)
<<<<<<< HEAD
>>>>>>> 86b6983 (up)
=======
 * @method static \Illuminate\Database\Eloquent\Builder|GroupSubgroup whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GroupSubgroup whereUpdatedBy($value)
>>>>>>> 23a412e (.)
 * @mixin \Eloquent
 */
class GroupSubgroup extends BaseModel {
    /**
     * @var string[]
     */
    protected $fillable = ['group_id', 'subgroup_id'];

    /**
     * Undocumented function.
     */
    public function groupPermUsers(): HasMany {
        return $this->hasMany(GroupPermUser::class);
    }

    // ---------------------------------------------------------------------------
}
