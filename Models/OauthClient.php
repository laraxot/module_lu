<?php

declare(strict_types=1);

namespace Modules\LU\Models;

use Laravel\Passport\Client as PassportClient;

/**
 * @mixin IdeHelperOauthClient
 */
class OauthClient extends PassportClient {
    /**
     * @var string
     */
    protected $connection = 'liveuser_general';

    //class OauthClient extends BaseModel {
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
