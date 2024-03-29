<?php

declare(strict_types=1);

namespace Modules\LU\Models;

/**
 * Modules\LU\Models\PermUserRight
 *
 * @property int $id
 * @property int $perm_user_id
 * @property int $right_id
 * @property int|null $right_level
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string|null $created_by
 * @property string|null $updated_by
 * @method static \Modules\LU\Database\Factories\PermUserRightFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|PermUserRight newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PermUserRight newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PermUserRight query()
 * @method static \Illuminate\Database\Eloquent\Builder|PermUserRight whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PermUserRight whereCreatedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PermUserRight whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PermUserRight wherePermUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PermUserRight whereRightId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PermUserRight whereRightLevel($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PermUserRight whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PermUserRight whereUpdatedBy($value)
 * @mixin \Eloquent
 */
class PermUserRight extends BasePivot
{
    /**
     * @var string[]
     */
    protected $fillable = ['perm_user_id', 'right_id', 'right_level'];
}
