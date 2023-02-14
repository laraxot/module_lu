<?php

declare(strict_types=1);

namespace Modules\LU\Models;

use Laravel\Passport\RefreshToken as PassportRefreshToken;

/**
 * Modules\LU\Models\OauthRefreshToken.
 *
 * @property-read \Modules\LU\Models\OauthAccessToken|null $accessToken
 * @method static \Illuminate\Database\Eloquent\Builder|OauthRefreshToken newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|OauthRefreshToken newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|OauthRefreshToken query()
 * @mixin \Eloquent
 */
class OauthRefreshToken extends PassportRefreshToken
{
    /**
     * @var string
     */
    protected $connection = 'liveuser_general';
    // protected $fillable = ['id', 'access_token_id', 'revoked', 'expires_at'];
}
