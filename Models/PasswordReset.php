<?php

declare(strict_types=1);

namespace Modules\LU\Models;

/**
 * Modules\LU\Models\PasswordReset
 *
 * @method static \Modules\LU\Database\Factories\PasswordResetFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|PasswordReset newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PasswordReset newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PasswordReset query()
 * @mixin \Eloquent
 */
class PasswordReset extends BaseModel {
    protected $fillable = ['email', 'token', 'created_at', 'updated_at', 'created_by', 'updated_by'];

    /**
     * @var string
     */
    protected $table = 'password_resets';
}// end class PasswordReset
