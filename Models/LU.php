<?php

namespace Modules\LU\Models;

use Illuminate\Database\Eloquent\Model;

class LU extends Model {
    protected $connection = 'liveuser_general'; // this will use the specified database conneciton
    protected $table = 'liveuser_users';
}
