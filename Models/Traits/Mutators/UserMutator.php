<?php

declare(strict_types=1);

namespace Modules\LU\Models\Traits\Mutators;

use Illuminate\Support\Str;

/*
 * Undocumented trait.
 */
trait UserMutator {
    // -------------- mutators ---------------------

    public function setPasswdAttribute(?string $value): void {
        // backtrace(true);
        unset($this->attributes['passwd']);
        if (null !== $value && '' !== $value && mb_strlen($value) < 30) {
            $this->attributes['passwd'] = md5($value);
        }
    }

    /**
     * @param string $value
     */
    public function setHandleAttribute($value): void {
        $this->attributes['handle'] = ucfirst($value);
    }

    /**
     * @param string $value
     *
     * @return string
     */
    public function getHandleAttribute($value) {
        if (null !== $value) {
            return $value;
        }

        return 'user-'.$this->id;
    }

    /**
     * @param string $value
     *
     * @return string
     */
    public function getGuidAttribute($value) {
        return Str::slug($this->handle);
    }

    /**
     * @param string $value
     *
     * @return string
     */
    public function getFullNameAttribute($value) {
        return Str::upper($this->first_name.' '.$this->last_name);
    }
}