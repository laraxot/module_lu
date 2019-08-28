<?php
namespace Modules\LU\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Pivot;
use Laravel\Scout\Searchable;
use Modules\Xot\Traits\Updater;

class UserRight extends Pivot{
    protected $fillable=['perm_user_id','right_id','right_level'];
    protected $connection = 'liveuser_general'; // this will use the specified database conneciton
    protected $table = 'liveuser_userrights';
    protected $primaryKey = 'right_id'; //array da errore su hasManyThrough

    use Updater;
    use Searchable;
}
