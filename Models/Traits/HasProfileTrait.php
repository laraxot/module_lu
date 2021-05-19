<?php

declare(strict_types=1);

namespace Modules\LU\Models\Traits;

use Illuminate\Support\Str;
use Modules\LU\Models\User;
use Modules\Xot\Services\TenantService as Tenant;

/**
 * Trait HasProfileTrait.
 */
trait HasProfileTrait {
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function user() {
        return $this->hasOne(User::class, 'auth_user_id', 'auth_user_id');
    }

    /**
     * @throws \ReflectionException
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function profile() {
        //$profile_class = config('xra.model.profile');
        if (null == $this->auth_user_id) {
            $this->auth_user_id = User::query()->first()->auth_user_id;
        }
        $profile_class = Tenant::model('profile');
        if ('' == $profile_class) {
            dddx('modifica config xra.php  aggiungi in model il profile');
        }
        $res = $this->hasOne(get_class($profile_class), 'auth_user_id', 'auth_user_id');
        if ($res->exists()) {
            return $res;
        }
        $res = $profile_class::query()->firstOrCreate(['auth_user_id' => $this->auth_user_id]);
        if (method_exists($res, 'post')) {
            $res->post()->create(
            [
                'auth_user_id' => $this->auth_user_id,
                'title' => $this->guid,
                'guid' => $this->guid,
                'lang' => app()->getLocale(),
            ]
        );
        }

        return $this->profile();
    }

    //uguale a quello di ProfilePanel, forse è meglio qui?
    //ne sta un altro utilizzato in UserPanel

    /**
     * @param int $size
     *
     * @return string|null
     */
    public function avatar($size = 100) {
        $user = $this->user;
        if (! is_object($user)) {
            if (isset($this->auth_user_id)) {
                $this->user()->create();
            }
            //dddx($this->row);
            return null;
        }
        $email = \md5(\mb_strtolower(\trim($user->email)));
        $default = \urlencode('https://tracker.moodle.org/secure/attachment/30912/f3.png');

        return "https://www.gravatar.com/avatar/$email?d=$default&s=$size";
    }

    /**
     * @param mixed $value
     *
     * @return string
     */
    public function getFullNameAttribute($value) {
        if ('' != $value) {
            return $value;
        }
        $user = $this->user;

        if (! is_object($user)) {
            return $value;
        }

        $value = Str::ucfirst($user->first_name).' '.Str::ucfirst($user->last_name);
        $user->profile()->update([
            'firstname' => $user->first_name,
            'surname' => $user->last_name,
        ]);

        //righe prese dal getFullNameAttribute che stava in profile.php
        if (strlen($value) < 5) {
            $value .= ' '.$user->handle;
        }
        $value = trim($value);

        return $value;
    }

    /**
     * @param mixed $value
     *
     * @return mixed
     */
    public function getEmailAttribute($value) {
        if ('' != $value) {
            return $value;
        }

        $user = $this->user;

        if (! is_object($user)) {
            return $value;
        }

        $this->email = $user->email;
        $this->save();
        $value = $user->email;

        return $value;
    }

    /**
     * @param mixed $value
     *
     * @return mixed
     */
    public function getFirstNameAttribute($value) {
        if ('' != $value) {
            return $value;
        }
        $user = $this->user;

        if (! is_object($user)) {
            return $value;
        }
        $value = $user->first_name;

        $this->firstname = $user->first_name;
        $this->save();

        return $value;
    }

    /* to last_name
    public function getSurNameAttribute($value) {
        if ('' != $value) {
            return $value;
        }
        $user = $this->user;

        if (! is_object($user)) {
            return $value;
        }
        $value = $user->surname;

        $this->surname = $user->last_name;
        $this->save();

        return $value;
    }
    */
}