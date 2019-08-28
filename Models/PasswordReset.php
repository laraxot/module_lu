<?php
namespace Modules\LU\Models;

use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;
use Modules\Xot\Traits\Updater;

class PasswordReset extends Model{
    protected $connection = 'liveuser_general'; // this will use the specified database conneciton
    protected $table = 'password_resets';
    use Searchable;
    use Updater;
 
 }//end class GroupUser
