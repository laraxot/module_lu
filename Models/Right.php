<?php

namespace Modules\LU\Models;

use Modules\Xot\Models\XotBaseModel;

class Right extends XotBaseModel {
    protected $connection = 'liveuser_general'; // this will use the specified database conneciton
    protected $table = 'liveuser_rights';
    protected $primaryKey = 'right_id';
    protected $fillable = ['right_id', 'area_id', 'right_define_name', 'has_implied', 'has_level'];
}
