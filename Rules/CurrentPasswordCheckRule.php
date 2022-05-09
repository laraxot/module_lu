<?php

declare(strict_types=1);

namespace Modules\LU\Rules;

use Illuminate\Contracts\Validation\Rule;
use Illuminate\Support\Facades\Hash;

/**
 * Class CurrentPasswordCheckRule.
 */
class CurrentPasswordCheckRule implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct()
    {
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param string $attribute
     * @param string $value
     *
     * @return bool
     */
    public function passes($attribute, $value)
    {
        $user = auth()->user();
        if (null == $user) {
            return false;
        }
        if (null == $user->password) {
            throw new \Exception('property password in $user is null');
        }

        return Hash::check($value, $user->password);
    }

    /**
     * Get the validation error message.
     *
     * @return array|string|null
     */
    public function message()
    {
        return __('The current password field does not match your password');
    }
}
