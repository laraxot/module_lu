<?php

declare(strict_types=1);

namespace Modules\LU\Models;

use Laravel\Passport\AuthCode as PassportAuthCode;

/**
 * Modules\LU\Models\OauthAuthCode.
 *
 * @property \Modules\LU\Models\OauthClient|null $client
 *
 * @method static \Illuminate\Database\Eloquent\Builder|OauthAuthCode newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|OauthAuthCode newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|OauthAuthCode query()
 *
 * @mixin \Eloquent
 */
class OauthAuthCode extends PassportAuthCode
{
    /**
     * @var string
     */
    protected $connection = 'liveuser_general';
    // protected $fillable = ['id', 'user_id', 'client_id', 'scopes', 'revoked', 'expires_at'];
}
