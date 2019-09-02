<?php
namespace Modules\LU\Models;

use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;
use Modules\Xot\Traits\Updater;

class GroupSubgroup extends Model{
    use Updater;

    protected $connection = 'liveuser_general';
    protected $table = 'liveuser_group_subgroups';
    protected $primaryKey = 'id';
    protected $fillable = ['group_id', 'subgroup_id'];

    public function GroupUser(){
        return $this->hasMany(GroupUser::class, 'group_id', 'group_id');
    }

    //---------------------------------------------------------------------------
}
