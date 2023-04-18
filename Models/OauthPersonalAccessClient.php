<?php

declare(strict_types=1);

namespace Modules\LU\Models;

use Laravel\Passport\PersonalAccessClient as PassportPersonalAccessClient;

/**
 * Modules\LU\Models\OauthPersonalAccessClient.
 *
 * @property-read \Modules\LU\Models\OauthClient|null $client
 * @method static \Illuminate\Database\Eloquent\Builder|OauthPersonalAccessClient newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|OauthPersonalAccessClient newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|OauthPersonalAccessClient query()
 * @property int $id
 * @property int $client_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|OauthPersonalAccessClient whereClientId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OauthPersonalAccessClient whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OauthPersonalAccessClient whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OauthPersonalAccessClient whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class OauthPersonalAccessClient extends PassportPersonalAccessClient
{
    /**
     * @var string
     */
    protected $connection = 'liveuser_general';
    // protected $fillable = ['id', 'client_id'];
}
