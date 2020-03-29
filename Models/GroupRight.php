<?php

namespace Modules\LU\Models;

use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;
use Modules\Xot\Traits\Updater;

class GroupRight extends Model {
    protected $fillable = ['group_id', 'right_id', 'right_level'];
    protected $connection = 'liveuser_general'; // this will use the specified database conneciton
    protected $table = 'liveuser_grouprights';
    protected $primaryKey = 'id';

    use Searchable;
    use Updater;
}
