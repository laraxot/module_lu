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
//use Spatie\Tags\HasTags;  // Spatie Tags
use Staudenmeir\EloquentHasManyDeep\HasRelationships;

/**
 * Modules\LU\Models\User
 *
 * @property int $id
 * @property string $handle
 * @property string|null $passwd
 * @property \Illuminate\Support\Carbon|null $last_login_at
 * @property string|null $last_login_ip
 * @property int|null $owner_user_id
 * @property int|null $owner_group_id
 * @property string|null $is_active
 * @property string|null $email
 * @property int|null $group_id
 * @property int|null $banned_id
 * @property int|null $country_id
 * @property int|null $question_id
 * @property string|null $nome
 * @property string|null $cognome
 * @property string|null $last_name
 * @property string|null $first_name
 * @property int|null $ente
 * @property int|null $matr
 * @property int|null $stabi
 * @property int|null $repar
 * @property string|null $password
 * @property string|null $two_factor_secret
 * @property string|null $two_factor_recovery_codes
 * @property string|null $hash
 * @property string|null $activation_code
 * @property string|null $forgotten_password_code
 * @property string|null $provincia
 * @property string|null $conosciuto
 * @property string|null $news
 * @property string|null $citta
 * @property int|null $segno
 * @property int|null $hmail
 * @property int|null $bounce
 * @property string|null $dataIscrizione
 * @property int|null $dataCancellazione
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string|null $remember_token
 * @property string|null $updated_by
 * @property string|null $created_by
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
<<<<<<< HEAD
 * @property-read \Modules\Xot\Models\Profile|null $profileOrCreate
=======
 * @property-read \Modules\Quaeris\Models\Profile|null $profile
 * @property-read \Modules\Quaeris\Models\Profile|null $profileOrCreate
>>>>>>> e29ae97 (.)
=======
 * @property-read \Modules\Xot\Models\Profile|null $profileOrCreate
>>>>>>> f0849a8 (up)
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
 * @method static \Illuminate\Database\Eloquent\Builder|User whereBannedId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereBounce($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereCitta($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereCognome($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereConosciuto($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereCountryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereCreatedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereDataCancellazione($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereDataIscrizione($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEnte($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereFirstName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereForgottenPasswordCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereGroupId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereHandle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereHash($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereHmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereIsActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereLastLoginAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereLastLoginIp($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereLastName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereMatr($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereNews($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereNome($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereOwnerGroupId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereOwnerUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User wherePasswd($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereProvincia($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereQuestionId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereRepar($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereSegno($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereStabi($value)
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
    //use HasTags;
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