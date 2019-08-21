<?php
<<<<<<< HEAD



namespace Modules\LU\Models;

use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;
use Modules\Extend\Traits\Updater;

class UserRight extends Model
=======
namespace Modules\LU\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Pivot;
use Laravel\Scout\Searchable;
use Modules\Extend\Traits\Updater;

class UserRight extends Pivot
>>>>>>> 8fdd9670f335166dfacb15a63a0c2c0250b7b156
{
    protected $fillable=['perm_user_id','right_id','right_level'];

    use Updater;
    use Searchable;

    protected $connection = 'liveuser_general'; // this will use the specified database conneciton
    protected $table = 'liveuser_userrights';
    //protected $primaryKey = ['perm_user_id','right_id'];
    protected $primaryKey = 'right_id'; //array da errore su hasManyThrough
}
