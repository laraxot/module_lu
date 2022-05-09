<?php

declare(strict_types=1);

namespace Modules\LU\Models\Traits\Extras;

use Illuminate\Support\Str;
use Modules\LU\Database\Factories\UserFactory;
use Modules\LU\Notifications\ResetPassword as ResetPasswordNotification;
use Modules\LU\Notifications\VerifyEmail as VerifyEmailNotification;

/*
 * Undocumented trait.
 */
trait UserExtra
{
    /**
     * @return mixed
     */
    public function role(string $role_name)
    {
        $profile = $this->profile;
        $role_method = Str::camel($role_name); //bell_boy => bellBoy
        //dddx($role_method);

        return $profile->{$role_method};
    }

    public function hasRole(string $name): bool
    {
        $role = $this->role($name);

        return is_object($role);
    }

    public function username(): string
    {
        return $this->handle;
    }

    public function name(): string
    {
        return $this->handle;
    }

    public function githubUsername(): string
    {
        return 'WIP';
    }

    //public function id() {
    //return $this->getKey();
    //    return $this->id;
    //}

    public function bio()
    {
        return 'WIP';
    }

    public function hasTwitterAccount(): bool
    {
        //return ! empty($this->twitter());
        return false;
    }

    //public function twitter(): ?string
    //{
    //    return $this->twitter;
    //}

    public function hasRight(string $value): bool
    {
        $perm_count = $this
            ->rights->where('right_define_name', $value)
            ->count();

        if ($perm_count > 0) {
            return true;
        } else {
            return false;
        }
    }

    public function isModerator()
    {
        return true;
    }

    //------------- notification ------------------

    public function sendPasswordResetNotification($token): void
    {
        $this->notify(new ResetPasswordNotification($token));
    }

    public function sendEmailVerificationNotification(): void
    {
        $this->notify(new VerifyEmailNotification());
    }

}
