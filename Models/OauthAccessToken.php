<?php

declare(strict_types=1);

namespace Modules\LU\Models;

// use Laravel\Passport\AccessToken as PassportAccessToken;
use Laravel\Passport\Token as PassportToken;

/**
 * old class OauthAccessToken extends BaseModel.
 *
 * @mixin IdeHelperOauthAccessToken
 */
class OauthAccessToken extends PassportToken {
    /**
     * @var string
     */
    protected $connection = 'liveuser_general';
    // protected $fillable = ['id', 'user_id', 'client_id', 'name', 'scopes', 'revoked', 'expires_at'];
}
