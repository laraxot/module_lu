<?php
namespace Modules\LU\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Pivot;

use Laravel\Scout\Searchable;
use Modules\Xot\Traits\Updater;

class GroupUser extends Pivot{
    protected $fillable=['perm_user_id','group_id'];
    protected $connection = 'liveuser_general'; // this will use the specified database conneciton
    protected $table = 'liveuser_groupusers';
    protected $primaryKey = 'group_id';

    use Updater;
    use Searchable;
    //------------- RELATIONSHIP ------------------------
    public function group(){
        return $this->hasOne(Group::class, 'group_id', 'group_id');
    }

//----------------------------------------
}//end class GroupUser
