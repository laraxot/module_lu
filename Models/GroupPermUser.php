<?php

declare(strict_types=1);

namespace Modules\LU\Models;

use Illuminate\Database\Eloquent\Relations\HasOne;

/**
 * Modules\LU\Models\GroupPermUser.
 *
 * @property int                             $id
 * @property int                             $perm_user_id
 * @property int                             $group_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string|null                     $created_by
 * @property string|null                     $updated_by
 * @property \Modules\LU\Models\Group|null   $group
 * @method static \Modules\LU\Database\Factories\GroupPermUserFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|GroupPermUser newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|GroupPermUser newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|GroupPermUser query()
 * @method static \Illuminate\Database\Eloquent\Builder|GroupPermUser whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GroupPermUser whereCreatedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GroupPermUser whereGroupId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GroupPermUser whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GroupPermUser wherePermUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GroupPermUser whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GroupPermUser whereUpdatedBy($value)
 * @mixin \Eloquent
 * @mixin IdeHelperGroupPermUser
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
