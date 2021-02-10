<?php

declare(strict_types=1);

namespace Modules\LU\Models;

//use Illuminate\Contracts\Auth\UserProvider as UserContract;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
//--- Notifications --
//--- contracts ----
//-- traits--
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Str;
use Modules\LU\Database\Factories\UserFactory;
use Modules\LU\Notifications\ResetPassword as ResetPasswordNotification;
use Modules\LU\Notifications\VerifyEmail as VerifyEmailNotification;
use Modules\Xot\Contracts\UserContract;
use Modules\Xot\Services\TenantService as Tenant;
use Modules\Xot\Traits\Updater;
use Nwidart\Modules\Facades\Module;

/**
 * Modules\LU\Models\User.
 *
 * @property int                                                                                                       $auth_user_id
 * @property string|null                                                                                               $handle
 * @property string|null                                                                                               $passwd
 * @property string|null                                                                                               $lastlogin
 * @property int|null                                                                                                  $owner_user_id
 * @property int|null                                                                                                  $owner_group_id
 * @property string|null                                                                                               $is_active
 * @property int|null                                                                                                  $enable
 * @property string|null                                                                                               $email
 * @property string|null                                                                                               $first_name
 * @property string|null                                                                                               $last_name
 * @property int|null                                                                                                  $ente
 * @property int|null                                                                                                  $matr
 * @property string|null                                                                                               $password
 * @property string|null                                                                                               $hash
 * @property string|null                                                                                               $activation_code
 * @property string|null                                                                                               $forgotten_password_code
 * @property \Illuminate\Support\Carbon|null                                                                           $last_login_at
 * @property string|null                                                                                               $last_login_ip
 * @property string|null                                                                                               $token_check
 * @property int|null                                                                                                  $is_verified
 * @property string|null                                                                                               $remember_token
 * @property \Illuminate\Support\Carbon|null                                                                           $email_verified_at
 * @property \Illuminate\Support\Carbon|null                                                                           $created_at
 * @property \Illuminate\Support\Carbon|null                                                                           $updated_at
 * @property string|null                                                                                               $created_by
 * @property string|null                                                                                               $updated_by
 * @property \Illuminate\Database\Eloquent\Collection|\Modules\LU\Models\AreaAdminArea[]                               $areaAdminAreas
 * @property int|null                                                                                                  $area_admin_areas_count
 * @property mixed                                                                                                     $full_name
 * @property mixed                                                                                                     $guid
 * @property \Illuminate\Database\Eloquent\Collection|\Modules\LU\Models\GroupUser[]                                   $groups
 * @property int|null                                                                                                  $groups_count
 * @property \Illuminate\Notifications\DatabaseNotificationCollection|\Illuminate\Notifications\DatabaseNotification[] $notifications
 * @property int|null                                                                                                  $notifications_count
 * @property \Modules\LU\Models\PermUser|null                                                                          $perm
 * @property \Illuminate\Database\Eloquent\Collection|\Modules\LU\Models\PermUser[]                                    $permUsers
 * @property int|null                                                                                                  $perm_users_count
 * @property \Illuminate\Database\Eloquent\Collection|\Modules\LU\Models\PermUser[]                                    $perms
 * @property int|null                                                                                                  $perms_count
 * @property \Illuminate\Database\Eloquent\Collection|\Modules\LU\Models\UserRight[]                                   $rights
 * @property int|null                                                                                                  $rights_count
 * @property \Illuminate\Database\Eloquent\Collection|\Modules\LU\Models\SocialProvider[]                              $socialProviders
 * @property int|null                                                                                                  $social_providers_count
 *
 * @method static \Illuminate\Database\Eloquent\Builder|User newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User query()
 * @method static \Illuminate\Database\Eloquent\Builder|User whereActivationCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereAuthUserId($value)
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
 * @method static \Illuminate\Database\Eloquent\Builder|User whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereUpdatedBy($value)
 * @mixin \Eloquent
 *
 * @property \Modules\Blog\Models\Profile|null $profile
 * @property int|null                          $group_id
 * @property int|null                          $banned_id
 * @property int|null                          $country_id
 * @property int|null                          $question_id
 * @property string|null                       $nome
 * @property string|null                       $cognome
 * @property int|null                          $stabi
 * @property int|null                          $repar
 * @property string|null                       $provincia
 * @property string|null                       $conosciuto
 * @property string|null                       $news
 * @property string|null                       $citta
 * @property int|null                          $segno
 * @property int|null                          $hmail
 * @property int|null                          $bounce
 * @property string|null                       $dataIscrizione
 * @property int|null                          $dataCancellazione
 *
 * @method static \Illuminate\Database\Eloquent\Builder|User whereBannedId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereBounce($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereCitta($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereCognome($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereConosciuto($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereCountryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereDataCancellazione($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereDataIscrizione($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereGroupId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereHmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereNews($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereNome($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereProvincia($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereQuestionId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereRepar($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereSegno($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereStabi($value)
 */
class User extends Authenticatable implements UserContract {
    use Notifiable;
    use Updater;
    use HasFactory;

    /**
     * @var string
     */
    protected $connection = 'liveuser_general'; // this will use the specified database conneciton

    protected $table = 'liveuser_users';

    protected $primaryKey = 'auth_user_id';

    /**
     * @var string[]
     */
    protected $fillable = [
        'auth_user_id', 'ente', 'matr', 'handle', 'passwd', 'email',
        'last_name', 'first_name',
        'last_login_at', 'last_login_ip',
    ];

    /**
     * @var string[]
     */
    protected $hidden = ['password', 'remember_token'];

    /**
     * @var string[]
     */
    protected $dates = ['last_login_at', 'created_at', 'updated_at', 'deleted_at'];

    /**
     * @var string[]
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

    //----------- relationships ---------------

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function socialProviders() {
        return $this->hasMany(SocialProvider::class, 'user_id', 'auth_user_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function perm() {
        return $this->hasOne(PermUser::class, 'auth_user_id', 'auth_user_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function perms() {
        return $this->hasMany(PermUser::class, 'auth_user_id', 'auth_user_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function permUsers() {
        return $this->hasMany(PermUser::class, 'auth_user_id', 'auth_user_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function profile() {
        $profile = Tenant::model('profile');

        $res = $this->hasOne($profile, 'auth_user_id', 'auth_user_id');

        if ($res->exists()) {
            return $res;
        }
        $res = $profile->firstOrCreate(['auth_user_id' => $this->auth_user_id]);

        if (method_exists($res, 'post')) {
            $res->post()->firstOrCreate(
                [
                    //    'auth_user_id' => $this->auth_user_id,
                    'guid' => $this->guid,
                    'lang' => app()->getLocale(),
                ],
                [
                    'title' => $this->guid,
                ]
            );
        }

        return $this->profile();
    }

    /**
     * @return \Illuminate\Database\Eloquent\Builder|\Illuminate\Database\Eloquent\Relations\HasManyThrough
     */
    public function areaAdminAreas() {
        $modules = Module::getOrdered();
        $modules = array_keys($modules);

        $rows = $this->hasManyThrough(
            AreaAdminArea::class,
            PermUser::class,
            'auth_user_id',
            'perm_user_id',
            'auth_user_id',
            'perm_user_id'
        )->whereHas('area', function ($q) use ($modules) {
            $q->whereIn('area_define_name', $modules);
        })
            ->with('area')
        ;

        return $rows;
    }

    /**
     * @return \Illuminate\Database\Eloquent\Builder|\Illuminate\Database\Eloquent\Relations\BelongsToMany|\Illuminate\Database\Eloquent\Relations\HasManyThrough
     */
    public function areas() {
        if (null == $this->perm && isset($this->auth_user_id)) {
            $this->perm = PermUser::query()->firstOrCreate(['auth_user_id' => $this->auth_user_id]);
        }
        if (null == $this->perm && ! isset($this->auth_user_id)) {
            return $this->areaAdminAreas();
        }

        return $this->perm->areas();
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany|\Illuminate\Database\Eloquent\Relations\HasManyThrough
     */
    public function groups() {
        if (null == $this->perm && ! isset($this->auth_user_id)) {
            return $this->hasManyThrough(
                GroupUser::class,
                PermUser::class,
                'auth_user_id',
                'perm_user_id',
                'auth_user_id',
                'perm_user_id'
            );
        }

        return $this->perm->groups();
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany|\Illuminate\Database\Eloquent\Relations\HasManyThrough
     */
    public function rights() {
        if (null == $this->perm && ! isset($this->auth_user_id)) {
            return $this->hasManyThrough(
                UserRight::class,
                PermUser::class,
                'auth_user_id',
                'perm_user_id',
                'auth_user_id',
                'perm_user_id'
            );
        }

        return $this->perm->rights();
    }

    //-------------- mutators ---------------------

    /**
     * @param mixed $value
     */
    public function setPasswdAttribute($value) {
        if (\mb_strlen($value) < 30) {
            $this->attributes['passwd'] = \md5($value);
        }
    }

    /**
     * @param mixed $value
     */
    public function setHandleAttribute($value) {
        $this->attributes['handle'] = ucfirst($value);
    }

    /**
     * @param mixed $value
     *
     * @return string
     */
    public function getHandleAttribute($value) {
        if ('' != $value) {
            return $value;
        }

        return 'user-'.$this->auth_user_id;
    }

    /**
     * @param mixed $value
     *
     * @return string
     */
    public function getGuidAttribute($value) {
        return Str::slug($this->handle);
    }

    /**
     * @param mixed $value
     *
     * @return string
     */
    public function getFullNameAttribute($value) {
        return Str::upper($this->first_name.' '.$this->last_name);
    }

    //------------- notification ------------------

    public function sendPasswordResetNotification($token) {
        $this->notify(new ResetPasswordNotification($token));
    }

    public function sendEmailVerificationNotification() {
        $this->notify(new VerifyEmailNotification());
    }

    //----------- functions -----------

    /**
     * @return mixed
     */
    public function role(string $role_name) {
        $profile = $this->profile;
        $role_method = Str::camel($role_name); //bell_boy => bellBoy
        //dddx($role_method);

        return $profile->{$role_method};
    }

    public function hasRole(string $name): bool {
        $role = $this->role($name);

        return is_object($role);
    }
}
