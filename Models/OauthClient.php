<?php

declare(strict_types=1);

namespace Modules\LU\Models;

use Laravel\Passport\Client as PassportClient;

/**
 * Modules\LU\Models\OauthClient.
 *
 * @property \Illuminate\Database\Eloquent\Collection|\Modules\LU\Models\OauthAuthCode[]    $authCodes
 * @property int|null                                                                       $auth_codes_count
 * @property string|null                                                                    $plain_secret
 * @property mixed                                                                          $secret
 * @property \Illuminate\Database\Eloquent\Collection|\Modules\LU\Models\OauthAccessToken[] $tokens
 * @property int|null                                                                       $tokens_count
 * @property \Modules\LU\Models\User|null                                                   $user
 *
 * @method static \Laravel\Passport\Database\Factories\ClientFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|OauthClient  newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|OauthClient  newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|OauthClient  query()
 *
 * @mixin \Eloquent
 */
class OauthClient extends PassportClient {
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
