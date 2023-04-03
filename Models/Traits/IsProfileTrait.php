<?php

declare(strict_types=1);

namespace Modules\LU\Models\Traits;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Collection;
use Illuminate\Support\Str;
use Modules\LU\Models\Area;
use Modules\LU\Models\User;

/**
 * Trait HasProfileTrait. DA RIPRENDERE.
 *
 * @property string|null $last_name
 */
trait IsProfileTrait {
    // --- RELATIONS
    public function user(): BelongsTo {
        return $this->belongsTo(User::class);
    }

    // uguale a quello di ProfilePanel, forse è meglio qui?
    // ne sta un altro utilizzato in UserPanel

    public function avatar(?int $size = 100): ?string {
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

    public function getFullNameAttribute(?string $value): ?string {
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

    public function getEmailAttribute(?string $value): ?string {
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
    public function getFirstNameAttribute(?string $value): ?string {
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

    public function fullName(): ?string {
        return $this->first_name.' '.$this->last_name;
    }

    public function handle(): string {
        if (null === $this->user) {
            throw new \Exception('['.__LINE__.']['.class_basename(__CLASS__).']');
        }

        return $this->user->handle;
    }

    public function assignArea(string $name): self {
        $area = Area::where('area_define_name', $name)->first();
        if (null === $this->user) {
            return $this;
        }
        $this->user->areas()->syncWithoutDetaching($area);

        return $this;
    }

    public function getAreas(): Collection {
        if (null == $this->user) {
            return collect([]);
        }

        return $this->user->areas;
    }

    public function hasAnyArea(array $areas): bool {
        $res = $this->user->areas->filter(function ($item) use ($areas) {
            return in_array($item->area_define_name, $areas);
        });

        return $res->count() > 0;
    }
}
