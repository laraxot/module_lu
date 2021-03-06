<?php

declare(strict_types=1);

namespace Modules\LU\Models;

/**
 * Modules\LU\Models\UserRight.
 *
 * @property int                             $id
 * @property int                             $perm_user_id
 * @property int                             $right_id
 * @property int|null                        $right_level
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string|null                     $created_by
 * @property string|null                     $updated_by
 * @method static \Illuminate\Database\Eloquent\Builder|UserRight newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|UserRight newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|UserRight query()
 * @method static \Illuminate\Database\Eloquent\Builder|UserRight whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserRight whereCreatedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserRight whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserRight wherePermUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserRight whereRightId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserRight whereRightLevel($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserRight whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserRight whereUpdatedBy($value)
 * @mixin \Eloquent
 */
class UserRight extends BasePivot {
    //protected $connection = 'liveuser_general'; // this will use the specified database conneciton
    /**
     * @var string[]
     */
    protected $fillable = ['perm_user_id', 'right_id', 'right_level'];
    /**
     * @var string
     */
    protected $table = 'liveuser_userrights';
    /**
     * @var string
     */
    protected $primaryKey = 'right_id'; //array da errore su hasManyThrough
}