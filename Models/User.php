<?php

namespace Modules\LU\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Str;
//--- Notifications --
use Modules\LU\Notifications\ResetPassword as ResetPasswordNotification;
use Modules\LU\Notifications\VerifyEmail as VerifyEmailNotification;
//--- contracts ----
use Modules\Xot\Contracts\UserContract;
//-- traits--
use Modules\Xot\Traits\Updater;

class User extends Authenticatable implements UserContract {
    use Notifiable;
    use Updater;

    protected $connection = 'liveuser_general'; // this will use the specified database conneciton
    protected $table = 'liveuser_users';
    protected $primaryKey = 'auth_user_id';
    protected $fillable = [
        'auth_user_id', 'ente', 'matr', 'handle', 'passwd', 'email',
        'last_name', 'first_name',
        'last_login_at', 'last_login_ip',
    ];
    protected $hidden = ['password', 'remember_token'];
    protected $dates = ['last_login_at', 'created_at', 'updated_at', 'deleted_at'];

    protected $casts = ['email_verified_at' => 'datetime'];
    public $timestamps = true;

    //----------- relationships ---------------
    public function socialProviders() {
        return $this->hasMany(SocialProvider::class, 'user_id', 'auth_user_id');
    }

    public function perm() {
        return $this->hasOne(PermUser::class, 'auth_user_id', 'auth_user_id');
    }

    public function perms() {
        return $this->hasMany(PermUser::class, 'auth_user_id', 'auth_user_id');
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
        $res->post()->create(
            [
                'auth_user_id' => $this->auth_user_id,
                'title' => $this->guid,
                'guid' => $this->guid,
                'lang' => \App::getLocale(),
            ]
        );

        return $this->profile();
    }

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

    //-------------- mutators ---------------------
    public function setPasswdAttribute($value) {
        if (\mb_strlen($value) < 30) {
            $this->attributes['passwd'] = \md5($value);
        }
    }

    public function getGuidAttribute($value) {
        return Str::slug($this->handle);
    }

    //------------- notification ------------------
    public function sendPasswordResetNotification($token) {
        $this->notify(new ResetPasswordNotification($token));
    }

    public function sendEmailVerificationNotification() {
        $this->notify(new VerifyEmailNotification());
    }
}
