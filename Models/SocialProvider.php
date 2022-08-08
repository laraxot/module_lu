<?php

declare(strict_types=1);

namespace Modules\LU\Models;

use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * Modules\LU\Models\SocialProvider
 *
 * @property-read \Modules\LU\Models\User|null $user
 * @method static \Modules\LU\Database\Factories\SocialProviderFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|SocialProvider newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|SocialProvider newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|SocialProvider query()
 * @mixin \Eloquent
 */
class SocialProvider extends BaseModel {
    /**
     * @var string[]
     */
    protected $fillable = [
        'id', 'user_id', 'provider_id', 'provider', 'token',
        'name', 'email', 'avatar',
    ];

    // ----------------RELATIONSHIP------------------------

    public function user(): BelongsTo {
        return $this->belongsTo(User::class);
    }
}
