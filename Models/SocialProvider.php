<?php

declare(strict_types=1);

namespace Modules\LU\Models;

use Illuminate\Database\Eloquent\Relations\BelongsTo;

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
