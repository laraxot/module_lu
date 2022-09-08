<?php

declare(strict_types=1);

namespace Modules\LU\Models;

use Spatie\Permission\Models\Role as SpatieRole;

/**
 * Modules\LU\Models\Role.
 *
 * @property int                                                                             $id
 * @property string                                                                          $name
 * @property string                                                                          $guard_name
 * @property \Illuminate\Support\Carbon|null                                                 $created_at
 * @property \Illuminate\Support\Carbon|null                                                 $updated_at
 * @property \Illuminate\Database\Eloquent\Collection|\Spatie\Permission\Models\Permission[] $permissions
 * @property int|null                                                                        $permissions_count
 * @property \Illuminate\Database\Eloquent\Collection|\Modules\LU\Models\User[]              $users
 * @property int|null                                                                        $users_count
 *
 * @method static \Illuminate\Database\Eloquent\Builder|Role newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Role newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Role permission($permissions)
 * @method static \Illuminate\Database\Eloquent\Builder|Role query()
 * @method static \Illuminate\Database\Eloquent\Builder|Role whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Role whereGuardName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Role whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Role whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Role whereUpdatedAt($value)
 *
 * @mixin \Eloquent
 */
class Role extends SpatieRole {
    /**
     * @var string
     */
    protected $connection = 'liveuser_general';

    protected $fillable = ['id', 'name', 'guard_name', 'created_at', 'updated_at'];
}
