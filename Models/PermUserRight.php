<?php

declare(strict_types=1);

namespace Modules\LU\Models;

/**
 * Modules\LU\Models\PermUserRight
 *
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
<<<<<<< HEAD
=======
=======
 * @property int $id
>>>>>>> 23a412e (.)
=======
 * @property int $id
>>>>>>> a49c283 (rebase)
 * @property int $perm_user_id
 * @property int $right_id
 * @property int|null $right_level
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
<<<<<<< HEAD
<<<<<<< HEAD
>>>>>>> 86b6983 (up)
=======
 * @property string|null $created_by
 * @property string|null $updated_by
>>>>>>> 23a412e (.)
=======
 * @property string|null $created_by
 * @property string|null $updated_by
>>>>>>> a49c283 (rebase)
=======
=======
 * @property int $id
>>>>>>> b0e660e (rebase)
 * @property int $perm_user_id
 * @property int $right_id
 * @property int|null $right_level
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
<<<<<<< HEAD
>>>>>>> df33cdc (up)
=======
 * @property string|null $created_by
 * @property string|null $updated_by
>>>>>>> b0e660e (rebase)
 * @method static \Modules\LU\Database\Factories\PermUserRightFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|PermUserRight newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PermUserRight newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PermUserRight query()
<<<<<<< HEAD
=======
 * @method static \Illuminate\Database\Eloquent\Builder|PermUserRight whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PermUserRight whereCreatedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PermUserRight whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PermUserRight wherePermUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PermUserRight whereRightId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PermUserRight whereRightLevel($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PermUserRight whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PermUserRight whereUpdatedBy($value)
>>>>>>> 86b6983 (up)
 * @mixin \Eloquent
 */
class PermUserRight extends BasePivot {
    /**
     * @var string[]
     */
    protected $fillable = ['perm_user_id', 'right_id', 'right_level'];
}
