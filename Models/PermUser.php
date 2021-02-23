<?php

declare(strict_types=1);

namespace Modules\LU\Models;

//use Illuminate\Database\Eloquent\Model;
//use Laravel\Scout\Searchable;
//use Modules\Xot\Traits\Updater;

/**
 * Modules\LU\Models\PermUser.
 *
 * @property int                                                                 $perm_user_id
 * @property int                                                                 $auth_user_id
 * @property int|null                                                            $perm_type
 * @property string                                                              $auth_container_name
 * @property \Illuminate\Support\Carbon|null                                     $created_at
 * @property \Illuminate\Support\Carbon|null                                     $updated_at
 * @property string|null                                                         $created_by
 * @property string|null                                                         $updated_by
 * @property \Illuminate\Database\Eloquent\Collection|\Modules\LU\Models\Area[]  $areas
 * @property int|null                                                            $areas_count
 * @property \Illuminate\Database\Eloquent\Collection|\Modules\LU\Models\Group[] $groups
 * @property int|null                                                            $groups_count
 * @property \Illuminate\Database\Eloquent\Collection|\Modules\LU\Models\Right[] $rights
 * @property int|null                                                            $rights_count
 *
 * @method static \Illuminate\Database\Eloquent\Builder|PermUser newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PermUser newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PermUser query()
 * @method static \Illuminate\Database\Eloquent\Builder|PermUser whereAuthContainerName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PermUser whereAuthUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PermUser whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PermUser whereCreatedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PermUser wherePermType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PermUser wherePermUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PermUser whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PermUser whereUpdatedBy($value)
 * @mixin \Eloquent
 *
 * @property \Modules\LU\Models\User|null                                                $User
 * @property \Illuminate\Database\Eloquent\Collection|\Modules\LU\Models\AreaAdminArea[] $areaAdminAreas
 * @property int|null                                                                    $area_admin_areas_count
 * @property \Illuminate\Database\Eloquent\Collection|\Modules\LU\Models\GroupUser[]     $groupUsers
 * @property int|null                                                                    $group_users_count
 * @property string|null                                                                 $deleted_at
 * @property string|null                                                                 $deleted_by
 * @property string|null                                                                 $deleted_ip
 * @property string|null                                                                 $created_ip
 * @property string|null                                                                 $updated_ip
 * @property string|null                                                                 $guid
 *
 * @method static \Illuminate\Database\Eloquent\Builder|PermUser whereCreatedIp($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PermUser whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PermUser whereDeletedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PermUser whereDeletedIp($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PermUser whereGuid($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PermUser whereUpdatedIp($value)
 */
class PermUser extends BaseModel {
    //use Searchable;
    //use Updater;

    //protected $connection = 'liveuser_general'; // this will use the specified database conneciton
    /**
     * @var string
     */
    protected $table = 'liveuser_perm_users';
    /**
     * @var string
     */
    protected $primaryKey = 'perm_user_id';
    /**
     * @var string[]
     */
    protected $fillable = ['auth_user_id', 'perm_type'];

    //------------ relationship ----------

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function User() {
        return $this->hasOne(User::class, 'auth_user_id', 'auth_user_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function areaAdminAreas() {
        return $this->hasMany(AreaAdminArea::class, 'perm_user_id', 'perm_user_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function groupUsers() {
        return $this->hasMany(GroupUser::class, 'perm_user_id', 'perm_user_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function areas() {
        $pivot = new AreaAdminArea();
        $rows = $this->belongsToMany(
            Area::class,
            $pivot->getTable(),
            'perm_user_id',
            'area_id'
        )
        ->using($pivot)
        ;

        return $rows;
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function groups() {
        $pivot = new GroupUser();
        $rows = $this->belongsToMany(
            Group::class,
            $pivot->getTable(),
            'perm_user_id',
            'group_id'
        )
        ->using($pivot)
        ;

        return $rows;
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function rights() {
        $pivot = new UserRight();
        $rows = $this->belongsToMany(
            Right::class,
            $pivot->getTable(),
            'perm_user_id',
            'right_id'
        )
        ->using($pivot)
        ;

        return $rows;
    }
}//end class PermUsers