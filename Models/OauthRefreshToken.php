<?php

declare(strict_types=1);

namespace Modules\LU\Models;

use Laravel\Passport\RefreshToken as PassportRefreshToken;

/**
 * old class OauthRefreshToken extends BaseModel
 *
 * @mixin IdeHelperOauthRefreshToken
 */
class OauthRefreshToken extends PassportRefreshToken {
    /**
     * @var string
     */
    protected $connection = 'liveuser_general';
    //protected $fillable = ['id', 'access_token_id', 'revoked', 'expires_at'];
}