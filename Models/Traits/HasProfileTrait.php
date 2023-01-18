<?php

declare(strict_types=1);

namespace Modules\LU\Models\Traits;

use Exception;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Support\Str;
use Modules\LU\Models\PermUser;
use Modules\LU\Models\User;
use Modules\Tenant\Services\TenantService;
use ReflectionException;

/**
 * Trait HasProfileTrait. DA RIPRENDERE.
 *
 * @property string|null $last_name
 */
trait HasProfileTrait
{
    // --- RELATIONS
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /*
    public function perm(): HasOne {
        return $this->hasOne(PermUser::class);
    }
    */

    /**
     * @throws ReflectionException
     *
     * @return HasOne
     */
    public function profile()
    {
        $user_id = $this->getAttributeValue('user_id');
        if (null === $user_id) {
            // throw new \Exception('$user_id is null');
            // 31     Cannot access property $user_id on mixed.
            // $user_id = User::query()->first()->user_id;
            // 33     Cannot call method getAttributeValue() on mixed.
            // $user_id = User::first()->getAttributeValue('user_id');
            $user_id = 1; // lo associo all'admin
        }
        $profile_class = TenantService::model('profile');
        if ('' == $profile_class) {
            dddx('modifica config xra.php  aggiungi in model il profile');
        }
        $res = $this->hasOne(\get_class($profile_class), 'user_id', 'user_id');
        if ($res->exists()) {
            return $res;
        }
        $res = $profile_class::query()->firstOrCreate(['user_id' => $user_id]);
        if (method_exists($res, 'post')) {
            $res->post()->create(
                [
                    'user_id' => $user_id,
                    'title' => $this->guid,
                    'guid' => $this->guid,
                    'lang' => app()->getLocale(),
                ]
            );
        }

        return $this->profile();
    }

    // uguale a quello di ProfilePanel, forse è meglio qui?
    // ne sta un altro utilizzato in UserPanel

    public function avatar(?int $size = 100): ?string
    {
        $user = $this->user;
        if (! \is_object($user)) {
            if (isset($this->user_id)) {
                $this->user()->create();
            }
            // dddx($this->row);
            return null;
        }
        if (null === $user->email) {
            return null;
        }
        $email = md5(mb_strtolower(trim($user->email)));
        $default = urlencode('https://tracker.moodle.org/secure/attachment/30912/f3.png');

        return "https://www.gravatar.com/avatar/$email?d=$default&s=$size";
    }

    public function getFullNameAttribute(?string $value): ?string
    {
        if (null !== $value) {
            return $value;
        }
        $user = $this->user;

        if (! \is_object($user)) {
            return $value;
        }
        if ('' == trim($user->first_name ?? '')) {
            $faker = \Faker\Factory::create();
            $user->update(['first_name' => $faker->firstName()]);
        }
        if ('' == trim($user->last_name ?? '')) {
            $faker = \Faker\Factory::create();
            $user->update(['last_name' => $faker->lastName()]);
        }

        $value = Str::ucfirst((string) $user->first_name).' '.Str::ucfirst((string) $user->last_name);
        $user->profile()->update(
            [
                'first_name' => $user->first_name,
                'last_name' => $user->last_name,
            ]
        );

        // righe prese dal getFullNameAttribute che stava in profile.php
        if (\strlen($value) < 5) {
            $value .= ' '.$user->handle;
        }
        $value = trim($value);

        return $value;
    }

    public function getEmailAttribute(?string $value): ?string
    {
        if (null !== $value) {
            return $value;
        }

        $user = $this->user;

        if (! \is_object($user)) {
            return $value;
        }

        $this->email = $user->email;
        $this->save();
        $value = $user->email;

        return $value;
    }

    /**
     * Undocumented getFirstNameAttribute.
     */
    public function getFirstNameAttribute(?string $value): ?string
    {
        if (null !== $value) {
            return $value;
        }
        $user = $this->user;

        if (! \is_object($user)) {
            return $value;
        }
        $value = $user->first_name;

        $this->first_name = $user->first_name;
        $this->save();

        return $value;
    }

    public function fullName(): ?string
    {
        return $this->first_name.' '.$this->last_name;
    }

    public function handle(): string
    {
        if (null === $this->user) {
            throw new Exception('['.__LINE__.']['.class_basename(__CLASS__).']');
        }

        return $this->user->handle;
    }

    /* to last_name
    public function getSurNameAttribute($value) {
        if (null !== $value) {
            return $value;
        }
        $user = $this->user;

        if (! is_object($user)) {
            return $value;
        }
        $value = $user->last_name;

        $this->last_name = $user->last_name;
        $this->save();

        return $value;
    }
    */
    /*
    // -- fare trait a parte ed aggiungere solo a quelli con parent_id  !!! esempio nel profile di MM

 */
}
