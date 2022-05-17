<?php

declare(strict_types=1);

namespace Modules\LU\Models;

use Laravel\Passport\PersonalAccessClient as PassportPersonalAccessClient;

/**
 * old class OauthPersonalAccessClient extends BaseModel.
 *
 * @mixin IdeHelperOauthPersonalAccessClient
 */
class OauthPersonalAccessClient extends PassportPersonalAccessClient {
    /**
     * @var string
     */
    protected $connection = 'liveuser_general';
    // protected $fillable = ['id', 'client_id'];
}
