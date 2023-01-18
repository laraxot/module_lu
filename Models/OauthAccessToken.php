<?php

declare(strict_types=1);

namespace Modules\LU\Models;

// use Laravel\Passport\AccessToken as PassportAccessToken;
use Laravel\Passport\Token as PassportToken;

/**
 * Modules\LU\Models\OauthAccessToken.
 *
 * @property \Modules\LU\Models\OauthClient|null $client
 * @property \Modules\LU\Models\User|null        $user
 *
 * @method static \Illuminate\Database\Eloquent\Builder|OauthAccessToken newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|OauthAccessToken newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|OauthAccessToken query()
 *
 * @mixin \Eloquent
 */
class OauthAccessToken extends PassportToken
{
    /**
     * @var string
     */
    protected $connection = 'liveuser_general';
    // protected $fillable = ['id', 'user_id', 'client_id', 'name', 'scopes', 'revoked', 'expires_at'];
}
