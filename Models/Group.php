<<<<<<< HEAD
<?php

namespace Modules\LU\Models;

//use Illuminate\Database\Eloquent\Model;
//use Modules\Xot\Traits\Updater;

/**
 * Modules\LU\Models\Group
 *
 * @property int $group_id
 * @property int|null $group_type
 * @property string|null $group_define_name
 * @property int|null $owner_user_id
 * @property int|null $owner_group_id
 * @property string $is_active
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string|null $created_by
 * @property string|null $updated_by
 * @property-read \Illuminate\Database\Eloquent\Collection|\Modules\LU\Models\GroupUser[] $GroupUser
 * @property-read int|null $group_user_count
 * @method static \Illuminate\Database\Eloquent\Builder|Group newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Group newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Group query()
 * @method static \Illuminate\Database\Eloquent\Builder|Group whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Group whereCreatedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Group whereGroupDefineName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Group whereGroupId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Group whereGroupType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Group whereIsActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Group whereOwnerGroupId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Group whereOwnerUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Group whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Group whereUpdatedBy($value)
 * @mixin \Eloquent
 */
class Group extends BaseModel {
    //use Updater;

    //protected $connection = 'liveuser_general';
    /**
     * @var string
     */
    protected $table = 'liveuser_groups';
    /**
     * @var string
     */
    protected $primaryKey = 'group_id';
    /**
     * @var string[]
     */
    protected $fillable = ['group_id', 'group_type', 'group_define_name', 'owner_user_id', 'owner_group_id', 'is_active'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function GroupUser() {
        return $this->hasMany(GroupUser::class, 'group_id', 'group_id');
    }

    //---------------------------------------------------------------------------
}
=======
<?php

namespace Modules\LU\Models;

//use Illuminate\Database\Eloquent\Model;
//use Modules\Xot\Traits\Updater;

/**
 * Modules\LU\Models\Group
 *
 * @property int $group_id
 * @property int|null $group_type
 * @property string|null $group_define_name
 * @property int|null $owner_user_id
 * @property int|null $owner_group_id
 * @property string $is_active
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string|null $created_by
 * @property string|null $updated_by
 * @property-read \Illuminate\Database\Eloquent\Collection|\Modules\LU\Models\GroupUser[] $GroupUser
 * @property-read int|null $group_user_count
 * @method static \Illuminate\Database\Eloquent\Builder|Group newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Group newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Group query()
 * @method static \Illuminate\Database\Eloquent\Builder|Group whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Group whereCreatedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Group whereGroupDefineName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Group whereGroupId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Group whereGroupType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Group whereIsActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Group whereOwnerGroupId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Group whereOwnerUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Group whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Group whereUpdatedBy($value)
 * @mixin \Eloquent
 */
class Group extends BaseModel {
    //use Updater;

    //protected $connection = 'liveuser_general';
    /**
     * @var string
     */
    protected $table = 'liveuser_groups';
    /**
     * @var string
     */
    protected $primaryKey = 'group_id';
    /**
     * @var string[]
     */
    protected $fillable = ['group_id', 'group_type', 'group_define_name', 'owner_user_id', 'owner_group_id', 'is_active'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function GroupUser() {
        return $this->hasMany(GroupUser::class, 'group_id', 'group_id');
    }

    //---------------------------------------------------------------------------
}
>>>>>>> ae14cf9 (first)
