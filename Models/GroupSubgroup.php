<?php

declare(strict_types=1);

namespace Modules\LU\Models;

use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * Modules\LU\Models\GroupSubgroup.
 *
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
 * @property int                                                                         $id
 * @property int                                                                         $group_id
 * @property int                                                                         $subgroup_id
 * @property \Illuminate\Support\Carbon|null                                             $created_at
 * @property \Illuminate\Support\Carbon|null                                             $updated_at
 * @property string|null                                                                 $created_by
 * @property string|null                                                                 $updated_by
 * @property \Illuminate\Database\Eloquent\Collection|\Modules\LU\Models\GroupPermUser[] $groupPermUsers
 * @property int|null                                                                    $group_perm_users_count
 *
<<<<<<< HEAD
=======
=======
 * @property int $id
>>>>>>> 4dbe463 (.)
=======
>>>>>>> 8dc2218 (rebase)
=======
 * @property int $id
>>>>>>> 4edd08c (rebase)
 * @property int $group_id
 * @property int $subgroup_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string|null $created_by
 * @property string|null $updated_by
 * @property-read \Illuminate\Database\Eloquent\Collection|\Modules\LU\Models\GroupPermUser[] $groupPermUsers
 * @property-read int|null $group_perm_users_count
>>>>>>> c36e7a4 (.)
 * @method static \Modules\LU\Database\Factories\GroupSubgroupFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|GroupSubgroup newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|GroupSubgroup newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|GroupSubgroup query()
 * @method static \Illuminate\Database\Eloquent\Builder|GroupSubgroup whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GroupSubgroup whereCreatedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GroupSubgroup whereGroupId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GroupSubgroup whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GroupSubgroup whereSubgroupId($value)
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
 * @method static \Illuminate\Database\Eloquent\Builder|GroupSubgroup whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GroupSubgroup whereUpdatedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GroupSubgroup whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GroupSubgroup whereUpdatedBy($value)
=======
>>>>>>> c36e7a4 (.)
=======
 * @method static \Illuminate\Database\Eloquent\Builder|GroupSubgroup whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GroupSubgroup whereUpdatedBy($value)
>>>>>>> 4dbe463 (.)
=======
>>>>>>> 8dc2218 (rebase)
=======
 * @method static \Illuminate\Database\Eloquent\Builder|GroupSubgroup whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GroupSubgroup whereUpdatedBy($value)
>>>>>>> 4edd08c (rebase)
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
