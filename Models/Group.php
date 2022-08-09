<?php

declare(strict_types=1);

namespace Modules\LU\Models;

use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * Modules\LU\Models\Group.
 *
 * @property int                                                                         $id
 * @property int|null                                                                    $group_type
 * @property string|null                                                                 $group_define_name
 * @property int|null                                                                    $owner_user_id
 * @property int|null                                                                    $owner_group_id
 * @property string                                                                      $is_active
 * @property \Illuminate\Support\Carbon|null                                             $created_at
 * @property \Illuminate\Support\Carbon|null                                             $updated_at
 * @property string|null                                                                 $created_by
 * @property string|null                                                                 $updated_by
 * @property \Illuminate\Database\Eloquent\Collection|\Modules\LU\Models\GroupPermUser[] $groupPermUsers
 * @property int|null                                                                    $group_perm_users_count
 *
<<<<<<< HEAD
=======
 * @property int $id
 * @property int|null $group_type
 * @property string|null $group_define_name
 * @property int|null $owner_user_id
 * @property int|null $owner_group_id
 * @property string $is_active
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string|null $created_by
 * @property string|null $updated_by
 * @property-read \Illuminate\Database\Eloquent\Collection|\Modules\LU\Models\GroupPermUser[] $groupPermUsers
 * @property-read int|null $group_perm_users_count
>>>>>>> c36e7a4 (.)
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
