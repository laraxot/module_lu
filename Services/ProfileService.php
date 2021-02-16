<?php

declare(strict_types=1);

namespace Modules\LU\Services;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Modules\Xot\Services\PanelService;
use Modules\Xot\Services\TenantService;

/**
 * Class ProfileService.
 */
class ProfileService {
    /**
     * Undocumented variable.
     *
     * @var object|Model
     */
    private $user = null;

    /**
     * Undocumented variable.
     *
     * @var object|Model
     */
    private $profile = null;

    private static ?ProfileService $instance = null;

    public static function getInstance(): self {
        if (null === self::$instance) {
            self::$instance = new self();
        }

        return self::$instance;
    }

    /**
     * @param object|Model $user
     *
     * @throws \ReflectionException
     */
    public static function get($user): self {
        $self = self::getInstance();

        if (is_object($user)) {
            $profile_model = TenantService::model('profile');
            if (null == $profile_model) {
                dddx('Aggiungi profile a xra.php');
            }
            $self->user = $user;
            $profile = $user->profile;
            if (null == $profile->updated_by) {
                $profile->updated_by = $user->handle;
                $profile->save();
            }
            $self->profile = $profile;
        }

        return $self;
    }

    /**
     * @return string|null
     */
    public function fullName() {
        if (null == $this->user) {
            return null;
        }

        return $this->user->first_name.' '.$this->user->last_name;
    }

    /**
     * @return null
     */
    public function handle() {
        if (null == $this->user) {
            return null;
        }

        return $this->user->handle;
    }

    /**
     * @return null
     */
    public function name() {
        if (null == $this->user) {
            return null;
        }

        return $this->user->first_name;
    }

    /**
     * @param int $size
     *
     * @return string|null
     */
    public function avatar($size = 100) {
        if (null == $this->user) {
            return null;
        }
        $email = \md5(\mb_strtolower(\trim($this->user->email)));
        $default = \urlencode('https://tracker.moodle.org/secure/attachment/30912/f3.png');

        return "https://www.gravatar.com/avatar/$email?d=$default&s=$size";
    }

    /*
    public function profile() {
        $profile = TenantService::model('profile');

        $res = $this->hasOne($profile, 'auth_user_id', 'auth_user_id');
        if ($res->exists()) {
            return $res;
        }
        $res = $profile->firstOrCreate(['auth_user_id' => $this->auth_user_id]);
        $res->post()->firstOrCreate(
            [
                //    'auth_user_id' => $this->auth_user_id,
                'guid' => $this->guid,
                'lang' => app()->getLocale(),
            ], [
                'title' => $this->guid,
            ]
        );

        return $this->profile();
    }
    */
    //*

    /**
     * @param string $role_name
     *
     * @return bool
     */
    public function hasRole($role_name) {
        if (null == $this->profile) {
            return false;
        }
        $role = $this->role($role_name);

        return is_object($role);
    }

    /**
     * @param string $role_name
     *
     * @return mixed|null
     */
    public function role($role_name) {
        if (null == $this->profile) {
            return null;
        }
        $role_method = Str::camel($role_name); //bell_boy => bellBoy

        return $this->profile->{$role_method};
    }

    /**
     * @return string
     */
    public function email() {
        return $this->user->email;
    }

    public function getPanel() {
        $profile_panel = PanelService::get($this->profile);

        return $profile_panel;
    }
}
