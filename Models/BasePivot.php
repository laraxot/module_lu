<<<<<<< HEAD
<?php

namespace Modules\LU\Models;

use Illuminate\Database\Eloquent\Relations\Pivot;

use Modules\Xot\Traits\Updater;
use Laravel\Scout\Searchable;

/**
 * Class BasePivot
 * @package Modules\LU\Models
 */
abstract class BasePivot extends Pivot{
    use Updater;
    use Searchable;

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
    public $incrementing = true;
}
=======
<?php

declare(strict_types=1);

namespace Modules\LU\Models;

use Illuminate\Database\Eloquent\Relations\Pivot;
use Laravel\Scout\Searchable;
use Modules\Xot\Traits\Updater;

/**
 * Class BasePivot.
 */
abstract class BasePivot extends Pivot {
    use Updater;
    use Searchable;

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
    public $incrementing = true;
}
>>>>>>> 3c191b8b6e72c4241b48547e7460883dfd14b26c
