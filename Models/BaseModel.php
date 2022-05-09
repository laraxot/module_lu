<?php

declare(strict_types=1);

namespace Modules\LU\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
//use Laravel\Scout\Searchable;
//---------- traits
use Modules\Xot\Services\FactoryService;
use Modules\Xot\Traits\Updater;

/**
 * Class BaseModel.
 */
abstract class BaseModel extends Model
{
    //use Searchable;
    use Updater;
    use HasFactory;

    /**
     * @var string
     */
    protected $connection = 'liveuser_general';

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

    /**
     * @var string
     */
    protected $primaryKey = 'id';

    /**
     * @var bool
     */
    public $incrementing = true; //meglio sempre avere un increment

    /**
     * Create a new factory instance for the model.
     *
     * @return \Illuminate\Database\Eloquent\Factories\Factory
     */
    protected static function newFactory()
    {
        return FactoryService::newFactory(get_called_class());
    }
}
