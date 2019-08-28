<?php
namespace Modules\LU\Models;

use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;
use Modules\Xot\Traits\Updater;

class Group extends Model{
    use Updater;

    protected $connection = 'liveuser_general';
    protected $table = 'liveuser_groups';
    protected $primaryKey = 'group_id';
    protected $fillable = ['group_id', 'group_type', 'group_define_name','owner_user_id','owner_group_id','is_active'];

    public function GroupUser(){
        return $this->hasMany(GroupUser::class, 'group_id', 'group_id');
    }

    //---------------------------------------------------------------------------
}
