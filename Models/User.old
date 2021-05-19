<?php

namespace Modules\LU\Models;

/*
* http://laraveldaily.com/save-users-last-login-time-ip-address/
*
**/

//use Illuminate\Auth\Authenticatable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Scout\Searchable;
use Modules\Blog\Models\Post;
use Modules\LU\Notifications\ResetPassword as ResetPasswordNotification;
use Modules\LU\Notifications\VerifyEmail   as VerifyEmailNotification;
//--------models -------
use Modules\Xot\Contracts\UserContract;
//---- contracts ---
use Modules\Xot\Traits\Updater;

class User extends Authenticatable implements MustVerifyEmail, UserContract {
    use Notifiable;
    use Updater;
    use Searchable;

    protected $connection = 'liveuser_general'; // this will use the specified database conneciton
    protected $table = 'liveuser_users';

    protected $primaryKey = 'auth_user_id';
    protected $fillable = [
        'ente', 'matr', 'handle', 'passwd', 'email',
        'last_name', 'first_name',
        'last_login_at', 'last_login_ip',
    ];
    protected $dates = ['last_login_at', 'created_at', 'updated_at', 'deleted_at'];

    public $rules = [
        'email' => 'required|unique:liveuser_general.liveuser_users|max:255',
    ];
    private $messages = [
      // 'esperienza_acquisita.required'=>'non te pol lassar sto campo vodo',
        'esperienza_acquisita.required' => 'non puoi lasciare questo campo vuoto',
        'name.required' => 'You cant leave name field empty',
        'name.min' => 'The field has to be :min chars long',
    ];

    protected $hidden = ['passwd', 'remember_token'];

    protected $append = ['url'];
    public $timestamps = true;

    public function isSuperAdmin() {
        if (is_object($this->perm) && $this->perm->perm_type >= 4) {  //superadmin
            return true;
        }

        return false;
    }

    public function isMine($post) {
        if ($post->created_by == $this->handle || $post->updated_by == $this->handle) {
            return true;
        }

        return false;
    }

    public function sendEmailVerificationNotification() {
        $this->notify(new VerifyEmailNotification());
    }

    public function routeNotificationForSlack() {
        return env('LOG_SLACK_WEBHOOK_URL', 'https://hooks.slack.com/services/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');
    }

    public function getAuthIdentifier() {
        return $this->getKey();
    }

    public function getAuthIdentifierName() {
        return 'auth_user_id';
    }

    //-----------------------------------------------------------
    public function socialProviders() {
        return $this->hasMany(SocialProvider::class, 'user_id', 'auth_user_id');
    }

    public function permUsers() {
        return $this->hasOne(PermUser::class, 'auth_user_id', 'auth_user_id');
    }

    public function perm() {
        return $this->hasOne(PermUser::class, 'auth_user_id', 'auth_user_id');
    }

    public function post() {
        return $this->morphOne(Post::class, 'post', null, 'post_id')->where('lang', $this->lang);
    }

    public function profile() {
        $profile_class = config('xra.model.profile');
        if ('' == $profile_class) {
            ddd('modifica config xra.php  aggiungi in model il profile');
        }
        $res = $this->hasOne(''.$profile_class, 'auth_user_id', 'auth_user_id');
        if ($res->exists()) {
            return $res;
        }
        $res = $profile_class::firstOrCreate(['auth_user_id' => $this->auth_user_id]);

        return $this->profile();
    }

    public function perm_user_id() { //shortcut
        $permUser = $this->perm;
        if (null == $permUser) {
            $permUser = PermUser::firstOrCreate(['auth_user_id' => $this->auth_user_id]);
        }
        $perm_user_id = $permUser->perm_user_id;

        return $perm_user_id;
    }

    ///----------------------------------------------------------------------

    public function groups_opts() {
        $groups = $this->groups()->get()->toArray();
        $collection = collect($groups);
        $plucked = $collection->pluck('group_define_name', 'group_id');
        $plucked->prepend('', '');

        return $plucked->all();
    }

    public function getHandleAttribute($value) {
        if ('' != $value) {
            return $value;
        }
        if (! isset($this->attributes['auth_user_id'])) {
            return 'Guest_'.rand(1, 10000);
        }
        $value = 'Guest'.$this->attributes['auth_user_id'];

        return $value;
    }

    public function getLangAttribute($value) {
        $lang = \App::getLocale();

        return $lang;
    }

    public function getAllAreasAttribute($value) {
        return Area::all();
    }

    public function getAllGroupsAttribute($value) {
        return Group::all();
    }

    public function getAllRightsAttribute($value) {
        return Right::all();
    }

    //-----------------------------------------------------------
    public function areaAdminAreas() {
        $modules = \Module::getOrdered();
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

    public function areas() {
        if (null == $this->perm) {
            $this->perm = PermUser::firstOrCreate(['auth_user_id' => $this->auth_user_id]);
        }

        return $this->perm->areas();
    }

    public function groups() {
        return $this->perm->groups();
    }

    public function rights() {
        return $this->perm->rights();
    }

    public function allRights() {
        return Right::all();
    }

    public function getAuthPassword() {
        //your password field name
        return $this->passwd;
    }

    public function metadata() {
        return $this->hasOne(Metadata::class);
    }

    public function getReminderEmail() {
        return $this->email;
    }

    public function getRememberToken() {
        return $this->remember_token;
    }

    public function setRememberToken($value) {
        $this->remember_token = $value;
    }

    public function getRememberTokenName() {
        return 'remember_token';
    }

    public function sendPasswordResetNotification($token) {
        $this->notify(new ResetPasswordNotification($token));
    }

    public function password() {
        return 'passwd';
    }

    public function username() {
        return 'handle';
    }

    public function getUrlAttribute($value) {
        $profile = $this->profile;
        if (! is_object($profile)) {
            $profile = $this->profile()->create();
        }
        $url = \Modules\Xot\Services\PanelService::get($profile)->showUrl();

        return $url;
    }

    public function getGravatarAttribute($value) {
        $publicBaseUrl = 'https://www.gravatar.com/avatar/';
        $secureBaseUrl = 'https://secure.gravatar.com/avatar/';
        $default = 'https://www.somewhere.com/homestar.jpg';
        $size = 80;

        return $secureBaseUrl.\md5(\mb_strtolower(\trim($this->email))).'&s='.$size;
    }

    public function getPermTypeAttribute($value) {
        $perm = $this->perm;
        if (\is_object($perm)) {
            return $perm->perm_type;
        }
        $this->perm()->create([]);

        return 0;
    }

    //--------------------
    public function setPasswdAttribute($value) {
        if (\mb_strlen($value) < 30) {
            $this->attributes['passwd'] = \md5($value);
        }
    }

    public function setUsernameAttribute($value) {
        $this->attributes['username'] = \mb_strtolower($value);
    }

    //-------------------------------
    public function name() {
        return $this->handle;
    }

    //---------------------------------------------------------------------------
    public function superAdmin() {
        if (! \is_array(config('xra.superadmins'))) {
            return false;
        }

        return \in_array($this->email, config('xra.superadmins'), true);
    }

    public function avatar($size = 100) {
        $email = \md5(\mb_strtolower(\trim($this->email)));
        $default = \urlencode('https://tracker.moodle.org/secure/attachment/30912/f3.png');

        return "https://www.gravatar.com/avatar/$email?d=$default&s=$size";
    }

    public function hasAvatar() {
        return true;
    }

    public function addArea($area) {
        $areas = $this->perm->areas->where('area_id', $area->area_id);
        if (0 == $areas->count()) { //lo aggiunge solo se non c'e'
            $this->perm->areas()->attach($area->area_id);
        }
    }

    //---------------------------------------------------
    public function urlLang($lang) {
        return '#';
    }
}//end class
