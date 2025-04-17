<?php

declare(strict_types=1);

namespace Modules\LU\Models\Traits\Mutators;

use Illuminate\Support\Str;

/*
 * Undocumented trait.
 */
trait UserMutator
{
    // -------------- mutators ---------------------

    public function setPasswdAttribute(?string $value): void
    {
        // backtrace(true);
        unset($this->attributes['passwd']);
        if (null !== $value && '' !== $value && mb_strlen($value) < 30) {
            $this->attributes['passwd'] = md5($value);
        }
    }

    /**
     * @param string $value
     */
    public function setHandleAttribute($value): void
    {
        $this->attributes['handle'] = ucfirst($value);
    }

    public function getHandleAttribute(?string $value): string
    {
        if (null !== $value) {
            return $value;
        }

        return 'user-'.$this->id;
    }

    public function getGuidAttribute(?string $value): string
    {
        return Str::slug($this->handle);
    }

    public function getFullNameAttribute(?string $value): string
    {
        return Str::upper($this->first_name.' '.$this->last_name);
    }
}
