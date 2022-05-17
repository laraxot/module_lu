<?php

declare(strict_types=1);

namespace Modules\LU\Models;

use Laravel\Passport\AuthCode as PassportAuthCode;

/**
 * old class OauthAuthCode extends BaseModel.
 *
 * @mixin IdeHelperOauthAuthCode
 */
class OauthAuthCode extends PassportAuthCode {
    /**
     * @var string
     */
    protected $connection = 'liveuser_general';
    // protected $fillable = ['id', 'user_id', 'client_id', 'scopes', 'revoked', 'expires_at'];
}
