<?php

declare(strict_types=1);

namespace Modules\LU\Models;

use Laravel\Passport\Client as PassportClient;

/**
 * Modules\LU\Models\OauthClient.
 *
 * @property int                                                                            $id
 * @property int|null                                                                       $user_id
 * @property string                                                                         $name
 * @property string|null                                                                    $secret
 * @property string|null                                                                    $provider
 * @property string                                                                         $redirect
 * @property bool                                                                           $personal_access_client
 * @property bool                                                                           $password_client
 * @property bool                                                                           $revoked
 * @property \Illuminate\Support\Carbon|null                                                $created_at
 * @property \Illuminate\Support\Carbon|null                                                $updated_at
 * @property \Illuminate\Database\Eloquent\Collection|\Modules\LU\Models\OauthAuthCode[]    $authCodes
 * @property int|null                                                                       $auth_codes_count
 * @property string|null                                                                    $plain_secret
 * @property \Illuminate\Database\Eloquent\Collection|\Modules\LU\Models\OauthAccessToken[] $tokens
 * @property int|null                                                                       $tokens_count
 * @property \Modules\LU\Models\User|null                                                   $user
 *
 * @method static \Laravel\Passport\Database\Factories\ClientFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|OauthClient  newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|OauthClient  newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|OauthClient  query()
 * @method static \Illuminate\Database\Eloquent\Builder|OauthClient  whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OauthClient  whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OauthClient  whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OauthClient  wherePasswordClient($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OauthClient  wherePersonalAccessClient($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OauthClient  whereProvider($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OauthClient  whereRedirect($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OauthClient  whereRevoked($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OauthClient  whereSecret($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OauthClient  whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OauthClient  whereUserId($value)
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
