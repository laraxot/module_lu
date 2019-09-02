<?php
namespace Modules\LU\Models;

use Modules\Xot\Models\XotBaseModel;

class RightImplied extends XotBaseModel {
    protected $connection = 'liveuser_general'; // this will use the specified database conneciton
    protected $table = 'liveuser_right_implied';
    protected $primaryKey = 'id';
    protected $fillable = ['right_id', 'implied_right_id'];
}