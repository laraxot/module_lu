<?php

/**
 * @see http://laraveldaily.com/save-users-last-login-time-ip-address/
 */

declare(strict_types=1);

namespace Modules\LU\Models;

// use Illuminate\Contracts\Auth\UserProvider as UserContract;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Laravel\Passport\HasApiTokens;
// use Spatie\Tags\HasTags;  // Spatie Tags;
use Modules\LU\Database\Factories\UserFactory;
use Modules\Xot\Contracts\UserContract;
use Modules\Xot\Traits\Updater;
use Staudenmeir\EloquentHasManyDeep\HasRelationships;

/**
 * Modules\LU\Models\User.
 *
 * @property int                                                                                                           $id
 * @property string                                                                                                        $handle
 * @property string|null                                                                                                   $passwd
 * @property string|null                                                                                                   $lastlogin
 * @property int|null                                                                                                      $owner_user_id
 * @property int|null                                                                                                      $owner_group_id
 * @property string|null                                                                                                   $is_active
 * @property int|null                                                                                                      $enable
 * @property string|null                                                                                                   $email
 * @property string|null                                                                                                   $first_name
 * @property string|null                                                                                                   $last_name
 * @property int|null                                                                                                      $ente
 * @property int|null                                                                                                      $matr
 * @property string|null                                                                                                   $password
 * @property string|null                                                                                                   $two_factor_secret
 * @property string|null                                                                                                   $two_factor_recovery_codes
 * @property string                                                                                                        $api_token
 * @property string|null                                                                                                   $hash
 * @property string|null                                                                                                   $activation_code
 * @property string|null                                                                                                   $forgotten_password_code
 * @property string|null                                                                                                   $last_login_at
 * @property string|null                                                                                                   $last_login_ip
 * @property string|null                                                                                                   $token_check
 * @property int|null                                                                                                      $is_verified
 * @property string|null                                                                                                   $remember_token
 * @property \Illuminate\Support\Carbon|null                                                                               $email_verified_at
 * @property \Illuminate\Support\Carbon|null                                                                               $created_at
 * @property \Illuminate\Support\Carbon|null                                                                               $updated_at
 * @property string|null                                                                                                   $created_by
 * @property string|null                                                                                                   $updated_by
 * @property \Illuminate\Database\Eloquent\Collection<int, \Modules\LU\Models\AreaPermUser>                                $areaPermUsers
 * @property int|null                                                                                                      $area_perm_users_count
 * @property \Illuminate\Database\Eloquent\Collection<int, \Modules\LU\Models\OauthClient>                                 $clients
 * @property int|null                                                                                                      $clients_count
 * @property string                                                                                                        $full_name
 * @property string                                                                                                        $guid
 * @property \Illuminate\Database\Eloquent\Collection<int, \Modules\LU\Models\GroupPermUser>                               $groupPermUsers
 * @property int|null                                                                                                      $group_perm_users_count
 * @property \Illuminate\Database\Eloquent\Collection<int, \Modules\LU\Models\GroupPermUser>                               $groups
 * @property int|null                                                                                                      $groups_count
 * @property \Illuminate\Notifications\DatabaseNotificationCollection<int, \Illuminate\Notifications\DatabaseNotification> $notifications
 * @property int|null                                                                                                      $notifications_count
 * @property \Modules\LU\Models\PermUser|null                                                                              $perm
 * @property \Modules\LU\Models\PermUser|null                                                                              $permUser
 * @property \Illuminate\Database\Eloquent\Collection<int, \Modules\LU\Models\PermUserRight>                               $permUserRights
 * @property int|null                                                                                                      $perm_user_rights_count
 * @property \Illuminate\Database\Eloquent\Collection<int, \Modules\LU\Models\PermUser>                                    $permUsers
 * @property int|null                                                                                                      $perm_users_count
 * @property \Illuminate\Database\Eloquent\Collection<int, \Modules\LU\Models\PermUser>                                    $perms
 * @property int|null                                                                                                      $perms_count
 * @property \Modules\PFed\Models\Profile|null                                                                             $profile
 * @property \Modules\Blog\Models\Profile|null                                                                             $profileOrCreate
 * @property \Illuminate\Database\Eloquent\Collection<int, \Modules\LU\Models\PermUserRight>                               $rights
 * @property int|null                                                                                                      $rights_count
 * @property \Illuminate\Database\Eloquent\Collection<int, \Modules\LU\Models\SocialProvider>                              $socialProviders
 * @property int|null                                                                                                      $social_providers_count
 * @property \Illuminate\Database\Eloquent\Collection<int, \Modules\LU\Models\OauthAccessToken>                            $tokens
 * @property int|null                                                                                                      $tokens_count
 *
 * @method static \Modules\LU\Database\Factories\UserFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|User newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User query()
 * @method static \Illuminate\Database\Eloquent\Builder|User whereActivationCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereApiToken($value)
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
 *
 * @mixin \Eloquent
 */
class User extends Authenticatable implements UserContract
{
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
        // 'api_token', //using passport
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
    protected static function newFactory()
    {
        return UserFactory::new();
    }

    // /*
    // public function __construct() {
        // $this->table = DB::connection($this->connection)->getDatabaseName().'.'.$this->getTable();
        // DB::connection($this->connection)->setTablePrefix('aa');
    // }
    // */

    // public function getTable() {
        // dddx([DB::connection($this->connection)->getDatabaseName(), parent::getTable()]);
        // We ask the database name on the connection and prepare that for the table name with a . in between.
        // Unknown database 'liveuser_liveuser_geek_lu'
        // return DB::connection($this->connection)->getDatabaseName().'.'.parent::getTable();
    // }

    public function getApiTokenAttribute(?string $value): string
    {
        if (null !== $value) {
            return $value;
        }
        $value = hash('sha256', Str::random(60));
        $this->api_token = $value;
        $this->save();

        return $value;
    }
}
