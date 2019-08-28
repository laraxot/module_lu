<?php
namespace Modules\LU\Models;

use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;
use Modules\Xot\Traits\Updater;

class PermUser extends Model{
    use Searchable;
    use Updater;

    protected $connection = 'liveuser_general'; // this will use the specified database conneciton
    protected $table = 'liveuser_perm_users';
    protected $primaryKey = 'perm_user_id';
    protected $fillable = ['auth_user_id', 'perm_type'];

    //------------ relationship ----------
    public function User(){
        return $this->hasOne('User', 'auth_user_id', 'auth_user_id');
    }

    public function areaAdminAreas(){
        return $this->hasMany('AreaAdminArea', 'perm_user_id', 'perm_user_id');
    }

    public function groupUsers(){
        return $this->hasMany('GroupUser', 'perm_user_id', 'perm_user_id');
    }

    public function areas(){
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

    public function groups(){
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

    public function rights(){
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
