<?php

declare(strict_types=1);

namespace Modules\LU\Models;

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
 * @method static \Modules\LU\Database\Factories\GroupRightFactory factory(...$parameters)
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
class GroupRight extends BasePivot {
    /**
     * @var string[]
     */
    protected $fillable = ['group_id', 'right_id', 'right_level'];
}
