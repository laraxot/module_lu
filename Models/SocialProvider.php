<?php

declare(strict_types=1);

namespace Modules\LU\Models;

//use Illuminate\Database\Eloquent\Model;

/**
 * Modules\LU\Models\SocialProvider.
 *
 * @property int                             $id
 * @property int                             $user_id
 * @property string                          $provider_id
 * @property string|null                     $provider
 * @property string|null                     $token
 * @property string|null                     $avatar
 * @property string|null                     $email
 * @property string|null                     $name
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string|null                     $created_by
 * @property string|null                     $updated_by
 * @property \Modules\LU\Models\User         $user
 * @method static \Illuminate\Database\Eloquent\Builder|SocialProvider newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|SocialProvider newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|SocialProvider query()
 * @method static \Illuminate\Database\Eloquent\Builder|SocialProvider whereAvatar($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SocialProvider whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SocialProvider whereCreatedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SocialProvider whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SocialProvider whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SocialProvider whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SocialProvider whereProvider($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SocialProvider whereProviderId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SocialProvider whereToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SocialProvider whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SocialProvider whereUpdatedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SocialProvider whereUserId($value)
 * @mixin \Eloquent
 */
class SocialProvider extends BaseModel {
    //protected $connection = 'liveuser_general'; // this will use the specified database conneciton
    /**
     * @var string
     */
    protected $table = 'social_providers';
    /**
     * @var string[]
     */
    protected $fillable = [
        'id', 'user_id', 'provider_id', 'provider', 'token',
        'name', 'email', 'avatar',
    ];

    //----------------RELATIONSHIP------------------------

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user() {
        return $this->belongsTo(User::class, 'user_id', 'auth_user_id');
    }
}