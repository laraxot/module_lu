<?php

declare(strict_types=1);

namespace Modules\LU\Models;

//use Illuminate\Database\Eloquent\Relations\Pivot;
//use Laravel\Scout\Searchable;
//use Modules\Xot\Traits\Updater;

/**
 * Modules\LU\Models\GroupUser.
 *
 * @property int                             $id
 * @property int                             $perm_user_id
 * @property int                             $group_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string|null                     $created_by
 * @property string|null                     $updated_by
 * @property \Modules\LU\Models\Group|null   $group
 * @method static \Illuminate\Database\Eloquent\Builder|GroupUser newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|GroupUser newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|GroupUser query()
 * @method static \Illuminate\Database\Eloquent\Builder|GroupUser whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GroupUser whereCreatedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GroupUser whereGroupId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GroupUser whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GroupUser wherePermUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GroupUser whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GroupUser whereUpdatedBy($value)
 * @mixin \Eloquent
 */
class GroupUser extends BasePivot {
    //use Updater;
    //use Searchable;
    //protected $connection = 'liveuser_general'; // this will use the specified database conneciton
    /**
     * @var string[]
     */
    protected $fillable = ['perm_user_id', 'group_id'];
    /**
     * @var string
     */
    protected $table = 'liveuser_groupusers';
    /**
     * @var string
     */
    protected $primaryKey = 'group_id';

    //------------- RELATIONSHIP ------------------------

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function group() {
        return $this->hasOne(Group::class, 'group_id', 'group_id');
    }

    //----------------------------------------
}//end class GroupUser