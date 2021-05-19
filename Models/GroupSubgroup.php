<?php

declare(strict_types=1);

namespace Modules\LU\Models;

//use Illuminate\Database\Eloquent\Model;
//use Modules\Xot\Traits\Updater;

/**
 * Modules\LU\Models\GroupSubgroup.
 *
 * @property int                                                                     $id
 * @property int                                                                     $group_id
 * @property int                                                                     $subgroup_id
 * @property \Illuminate\Support\Carbon|null                                         $created_at
 * @property \Illuminate\Support\Carbon|null                                         $updated_at
 * @property string|null                                                             $created_by
 * @property string|null                                                             $updated_by
 * @property \Illuminate\Database\Eloquent\Collection|\Modules\LU\Models\GroupUser[] $GroupUser
 * @property int|null                                                                $group_user_count
 *
 * @method static \Illuminate\Database\Eloquent\Builder|GroupSubgroup newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|GroupSubgroup newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|GroupSubgroup query()
 * @method static \Illuminate\Database\Eloquent\Builder|GroupSubgroup whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GroupSubgroup whereCreatedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GroupSubgroup whereGroupId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GroupSubgroup whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GroupSubgroup whereSubgroupId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GroupSubgroup whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GroupSubgroup whereUpdatedBy($value)
 * @mixin \Eloquent
 */
class GroupSubgroup extends BaseModel {
    //use Updater;

    //protected $connection = 'liveuser_general';
    /**
     * @var string
     */
    protected $table = 'liveuser_group_subgroups';
    /**
     * @var string
     */
    protected $primaryKey = 'id';
    /**
     * @var string[]
     */
    protected $fillable = ['group_id', 'subgroup_id'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function GroupUser() {
        return $this->hasMany(GroupUser::class, 'group_id', 'group_id');
    }

    //---------------------------------------------------------------------------
}