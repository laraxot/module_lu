<?php
namespace Modules\LU\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Pivot;

use Laravel\Scout\Searchable;
use Modules\Extend\Traits\Updater;

class GroupUser extends Pivot
{
    use Searchable;
    use Updater;
    protected $connection = 'liveuser_general'; // this will use the specified database conneciton
    protected $table = 'liveuser_groupusers';
    /* protected $primaryKey = ['perm_user_id','group_id'];*/ //questo da errore al toArray
    protected $primaryKey = 'group_id';

    //--------------------------------------------------
    public function group()
    {
        return $this->hasOne(Group::class, 'group_id', 'group_id');
    }

    //----------------------------------------
//----------------------------------------
}//end class GroupUser
