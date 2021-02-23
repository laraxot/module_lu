<<<<<<< HEAD
<?php

namespace Modules\LU\Models;

use Illuminate\Database\Eloquent\Model;
//use Laravel\Scout\Searchable;
//use Modules\Xot\Traits\Updater;

/**
 * Modules\LU\Models\GroupRight
 *
 * @property int $id
 * @property int $group_id
 * @property int $right_id
 * @property int|null $right_level
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string|null $created_by
 * @property string|null $updated_by
 * @method static \Illuminate\Database\Eloquent\Builder|GroupRight newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|GroupRight newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|GroupRight query()
 * @method static \Illuminate\Database\Eloquent\Builder|GroupRight whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GroupRight whereCreatedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GroupRight whereGroupId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GroupRight whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GroupRight whereRightId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GroupRight whereRightLevel($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GroupRight whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GroupRight whereUpdatedBy($value)
 * @mixin \Eloquent
 */
class GroupRight extends BaseModel {
    //use Searchable;
    //use Updater;
    /**
     * @var string[]
     */
    protected $fillable = ['group_id', 'right_id', 'right_level'];
    //protected $connection = 'liveuser_general'; // this will use the specified database conneciton
    /**
     * @var string
     */
    protected $table = 'liveuser_grouprights';
    /**
     * @var string
     */
    protected $primaryKey = 'id';

}
=======
<?php

declare(strict_types=1);

namespace Modules\LU\Models;

//use Laravel\Scout\Searchable;
//use Modules\Xot\Traits\Updater;

/**
 * Modules\LU\Models\GroupRight.
 *
 * @property int                             $id
 * @property int                             $group_id
 * @property int                             $right_id
 * @property int|null                        $right_level
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string|null                     $created_by
 * @property string|null                     $updated_by
 *
 * @method static \Illuminate\Database\Eloquent\Builder|GroupRight newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|GroupRight newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|GroupRight query()
 * @method static \Illuminate\Database\Eloquent\Builder|GroupRight whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GroupRight whereCreatedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GroupRight whereGroupId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GroupRight whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GroupRight whereRightId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GroupRight whereRightLevel($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GroupRight whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GroupRight whereUpdatedBy($value)
 * @mixin \Eloquent
 */
class GroupRight extends BaseModel {
    //use Searchable;
    //use Updater;
    /**
     * @var string[]
     */
    protected $fillable = ['group_id', 'right_id', 'right_level'];
    //protected $connection = 'liveuser_general'; // this will use the specified database conneciton
    /**
     * @var string
     */
    protected $table = 'liveuser_grouprights';
    /**
     * @var string
     */
    protected $primaryKey = 'id';
}
>>>>>>> 3c191b8b6e72c4241b48547e7460883dfd14b26c
