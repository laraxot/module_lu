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
     * @param string $value
     *
     * @return bool
     */
    public function passes($attribute, $value) {
        $user = auth()->user();

        // dddx([$user, $value, $user->passwd]);

        if (null === $user) {
            return false;
        }

        if (empty($user->passwd)) {
            throw new \Exception('property password in $user is null');
        }

        return md5($value) === $user->passwd;
        // return Hash::check($value, $user->passwd);
    }

    /**
     * Get the validation error message.
     *
     * @return mixed
     */
    public function message() {
        return __('The current password field does not match your password');
    }
}
