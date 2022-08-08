<?php

declare(strict_types=1);

namespace Modules\LU\Models;

use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * Modules\LU\Models\Group
 *
 * @property-read \Illuminate\Database\Eloquent\Collection|\Modules\LU\Models\GroupPermUser[] $groupPermUsers
 * @property-read int|null $group_perm_users_count
 * @method static \Modules\LU\Database\Factories\GroupFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|Group newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Group newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Group query()
 * @mixin \Eloquent
 */
class Group extends BaseModel {
    protected $fillable = ['id', 'group_type', 'group_define_name', 'owner_user_id', 'owner_group_id', 'is_active'];

    /**
     * Undocumented function.
     */
    public function groupPermUsers(): HasMany {
        return $this->hasMany(GroupPermUser::class);
    }

    // ---------------------------------------------------------------------------
}
