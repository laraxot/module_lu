<?php

declare(strict_types=1);

namespace Modules\LU\Models;

use Laravel\Passport\Client as PassportClient;

/**
 * Modules\LU\Models\OauthClient.
 *
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Modules\LU\Models\OauthAuthCode> $authCodes
 * @property-read int|null $auth_codes_count
 * @property-read string|null $plain_secret
 * @property-write mixed $secret
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Modules\LU\Models\OauthAccessToken> $tokens
 * @property-read int|null $tokens_count
 * @property-read \Modules\LU\Models\User|null $user
 * @method static \Laravel\Passport\Database\Factories\ClientFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|OauthClient newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|OauthClient newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|OauthClient query()
 * @mixin \Eloquent
 */
class OauthClient extends PassportClient
{
    /**
     * @var string
     */
    protected $connection = 'liveuser_general';

    // class OauthClient extends BaseModel {
    /*
     * ---.
     */
    /*
    protected $fillable = [
        'id', 'user_id', 'name', 'secret', 'provider', 'redirect',
        'personal_access_client', 'password_client', 'revoked',
    ];
    */
}
