<?php

declare(strict_types=1);

namespace Modules\LU\Models;

use Illuminate\Database\Eloquent\Model;
//use Laravel\Scout\Searchable;
//---------- traits
use Modules\Xot\Traits\Updater;

/**
 * Class BaseModel.
 */
abstract class BaseModel extends Model {
    use Updater;
    //use Searchable;

    /**
     * @var string
     */
    protected $connection = 'liveuser_general'; // this will use the specified database conneciton
    /**
     * @var array
     */
    protected $appends = [];
    /**
     * @var array
     */
    protected $casts = [];
    /**
     * @var string[]
     */
    protected $dates = ['created_at', 'updated_at'];
    //protected $primaryKey = 'id';
    /**
     * @var bool
     */
    public $incrementing = true; //meglio sempre avere un increment
}