<?php

declare(strict_types=1);

namespace Modules\LU\Models;

use Laravel\Passport\PersonalAccessClient as PassportPersonalAccessClient;

/**
 * Modules\LU\Models\OauthPersonalAccessClient.
 *
 * @property \Modules\LU\Models\OauthClient|null $client
 *
 * @method static \Illuminate\Database\Eloquent\Builder|OauthPersonalAccessClient newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|OauthPersonalAccessClient newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|OauthPersonalAccessClient query()
 *
 * @mixin \Eloquent
 */
class OauthPersonalAccessClient extends PassportPersonalAccessClient {
    /**
     * @var string
     */
    protected $connection = 'liveuser_general';
    // protected $fillable = ['id', 'client_id'];
}
