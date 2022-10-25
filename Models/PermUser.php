<?php

declare(strict_types=1);

namespace Modules\LU\Models;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * Modules\LU\Models\PermUser.
 *
 * @property int                                                                         $id
 * @property int                                                                         $user_id
 * @property int|null                                                                    $perm_type
 * @property string                                                                      $auth_container_name
 * @property \Illuminate\Support\Carbon|null                                             $created_at
 * @property \Illuminate\Support\Carbon|null                                             $updated_at
 * @property string|null                                                                 $created_by
 * @property string|null                                                                 $updated_by
 * @property \Illuminate\Database\Eloquent\Collection|\Modules\LU\Models\AreaPermUser[]  $areaPermUsers
 * @property int|null                                                                    $area_perm_users_count
 * @property \Illuminate\Database\Eloquent\Collection|\Modules\LU\Models\Area[]          $areas
 * @property int|null                                                                    $areas_count
 * @property \Illuminate\Database\Eloquent\Collection|\Modules\LU\Models\GroupPermUser[] $groupPermUsers
 * @property int|null                                                                    $group_perm_users_count
 * @property \Illuminate\Database\Eloquent\Collection|\Modules\LU\Models\Group[]         $groups
 * @property int|null                                                                    $groups_count
 * @property \Illuminate\Database\Eloquent\Collection|\Modules\LU\Models\Right[]         $rights
 * @property int|null                                                                    $rights_count
 * @property \Modules\LU\Models\User|null                                                $user
 *
 * @method static \Modules\LU\Database\Factories\PermUserFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|PermUser newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PermUser newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PermUser query()
 * @method static \Illuminate\Database\Eloquent\Builder|PermUser whereAuthContainerName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PermUser whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PermUser whereCreatedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PermUser whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PermUser wherePermType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PermUser whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PermUser whereUpdatedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PermUser whereUserId($value)
 *
 * @mixin \Eloquent
 */
class PermUser extends BaseModel {
    /**
     * @var string[]
     */
    protected $fillable = ['id', 'user_id', 'perm_type'];

    // ------------ relationship ----------

    /**
     * Undocumented function.
     */
    public function user(): BelongsTo {
        return $this->belongsTo(User::class);
    }

    public function areaPermUsers(): HasMany {
        return $this->hasMany(AreaPermUser::class);
    }

    public function groupPermUsers(): HasMany {
        return $this->hasMany(GroupPermUser::class);
    }

    public function areas(): BelongsToMany {
        $pivot_class = AreaPermUser::class; // nome deciso da laravel !
        $pivot = app($pivot_class);
        $rows = $this->belongsToMany(
            Area::class,
            // $pivot->getTable(),
            // 'perm_user_id',
            // 'area_id'
        )
            ->using($pivot_class);
        // ->withPivot('score')
        // ->withTimestamps();

        return $rows;
    }

    public function groups(): BelongsToMany {
        $pivot_class = GroupPermUser::class; // nome deciso da laravel !
        $pivot = app($pivot_class);
        $rows = $this->belongsToMany(
            Group::class,
            // $pivot->getTable(),
            // 'perm_user_id',
            // 'group_id'
        )
            ->using($pivot_class);

        return $rows;
    }

    public function rights(): BelongsToMany {
        $pivot_class = PermUserRight::class; // nome deciso da laravel !
        $pivot = app($pivot_class);
        $rows = $this->belongsToMany(
            Right::class,
            // $pivot->getTable(),
            // 'perm_user_id',
            // 'right_id'
        )
            ->using($pivot_class);

        return $rows;
    }
}// end class PermUsers
