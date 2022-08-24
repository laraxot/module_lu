<?php
/**
 * ---.A.
 * ---.B.
 */
declare(strict_types=1);

namespace Modules\LU\Models;

// use Illuminate\Contracts\Auth\UserProvider as UserContract;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;
use Modules\LU\Database\Factories\UserFactory;
use Modules\Xot\Contracts\UserContract;
use Modules\Xot\Traits\Updater;
// use Spatie\Tags\HasTags;  // Spatie Tags
use Staudenmeir\EloquentHasManyDeep\HasRelationships;

/**
 * Modules\LU\Models\User
 *
 * @property int $id
 * @property string $handle
 * @property string|null $passwd
 * @property string|null $lastlogin
 * @property int|null $owner_user_id
 * @property int|null $owner_group_id
 * @property string|null $is_active
 * @property int|null $enable
 * @property string|null $email
 * @property string|null $first_name
 * @property string|null $last_name
 * @property int|null $ente
 * @property int|null $matr
 * @property string|null $password
 * @property string|null $two_factor_secret
 * @property string|null $two_factor_recovery_codes
 * @property string|null $hash
 * @property string|null $activation_code
 * @property string|null $forgotten_password_code
 * @property \Illuminate\Support\Carbon|null $last_login_at
 * @property string|null $last_login_ip
 * @property string|null $token_check
 * @property int|null $is_verified
 * @property string|null $remember_token
 * @property \Illuminate\Support\Carbon|null $email_verified_at
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string|null $created_by
 * @property string|null $updated_by
 * @property-read \Illuminate\Database\Eloquent\Collection|\Modules\LU\Models\AreaPermUser[] $areaPermUsers
 * @property-read int|null $area_perm_users_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\Modules\LU\Models\OauthClient[] $clients
 * @property-read int|null $clients_count
 * @property-read string $full_name
 * @property-read string $guid
 * @property-read \Illuminate\Database\Eloquent\Collection|\Modules\LU\Models\GroupPermUser[] $groupPermUsers
 * @property-read int|null $group_perm_users_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\Modules\LU\Models\GroupPermUser[] $groups
 * @property-read int|null $groups_count
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection|\Illuminate\Notifications\DatabaseNotification[] $notifications
 * @property-read int|null $notifications_count
 * @property-read \Modules\LU\Models\PermUser|null $perm
 * @property-read \Modules\LU\Models\PermUser|null $permUser
 * @property-read \Illuminate\Database\Eloquent\Collection|\Modules\LU\Models\PermUserRight[] $permUserRights
 * @property-read int|null $perm_user_rights_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\Modules\LU\Models\PermUser[] $permUsers
 * @property-read int|null $perm_users_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\Modules\LU\Models\PermUser[] $perms
 * @property-read int|null $perms_count
<<<<<<< HEAD
 * @property-read \Modules\Mediamonitor\Models\Profile|null $profileOrCreate
=======
<<<<<<< HEAD
 * @property-read \Modules\Xot\Models\Profile|null $profileOrCreate
=======
 * @property-read \Modules\Quaeris\Models\Profile|null $profile
 * @property-read \Modules\Quaeris\Models\Profile|null $profileOrCreate
>>>>>>> 1f4a4e6 (.)
>>>>>>> 06817bb (.)
 * @property-read \Illuminate\Database\Eloquent\Collection|\Modules\LU\Models\PermUserRight[] $rights
 * @property-read int|null $rights_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\Modules\LU\Models\SocialProvider[] $socialProviders
 * @property-read int|null $social_providers_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\Modules\LU\Models\OauthAccessToken[] $tokens
 * @property-read int|null $tokens_count
 * @method static \Modules\LU\Database\Factories\UserFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|User newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User query()
 * @method static \Illuminate\Database\Eloquent\Builder|User whereActivationCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereCreatedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmailVerifiedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEnable($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEnte($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereFirstName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereForgottenPasswordCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereHandle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereHash($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereIsActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereIsVerified($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereLastLoginAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereLastLoginIp($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereLastName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereLastlogin($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereMatr($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereOwnerGroupId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereOwnerUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User wherePasswd($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereTokenCheck($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereTwoFactorRecoveryCodes($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereTwoFactorSecret($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereUpdatedBy($value)
 * @mixin \Eloquent
 */
class User extends Authenticatable implements UserContract {
    use HasApiTokens;
    use HasFactory;
    use HasRelationships;
    // use HasTags;
    use Notifiable;
    use Traits\Extras\UserExtra; // spatie tags
    use Traits\Mutators\UserMutator;
    use Traits\Relationships\UserRelationship;
    use Updater;
    /**
     * Indicates whether attributes are snake cased on arrays.
     *
     * @see  https://laravel-news.com/6-eloquent-secrets
     *
     * @var bool
     */
    public static $snakeAttributes = true;

    protected $perPage = 30;

    /**
     * @var string
     */
    protected $connection = 'liveuser_general'; // this will use the specified database conneciton

    protected $primaryKey = 'id';

    /**
     * @var string[]
     */
    protected $fillable = [
        'id', 'ente', 'matr',
        'handle', 'passwd', 'email',
        'last_name', 'first_name',
        'last_login_at', 'last_login_ip',
        'api_token',
    ];

    /**
     * @var array<int, string>
     */
    protected $hidden = ['password', 'remember_token'];

    /**
     * @var string[]
     */
    protected $dates = ['last_login_at', 'created_at', 'updated_at', 'deleted_at'];

    /**
     * @var array<string, string>
     */
    protected $casts = ['email_verified_at' => 'datetime'];

    public $timestamps = true;

    /**
     * Create a new factory instance for the model.
     *
     * @return \Illuminate\Database\Eloquent\Factories\Factory
     */
    protected static function newFactory() {
        return UserFactory::new();
    }
}
