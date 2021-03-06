<?php

declare(strict_types=1);

namespace Modules\LU\Rules;

use Illuminate\Contracts\Validation\Rule;
use Illuminate\Support\Facades\Hash;

/**
 * Class CurrentPasswordCheckRule.
 */
class CurrentPasswordCheckRule implements Rule {
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct() {
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param string $attribute
     * @param mixed  $value
     *
     * @return bool
     */
    public function passes($attribute, $value) {
        return Hash::check($value, auth()->user()->password);
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message() {
        return __('The current password field does not match your password');
    }
}