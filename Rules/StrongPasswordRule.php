<?php

declare(strict_types=1);

namespace Modules\LU\Rules;

use Illuminate\Contracts\Validation\Rule;

/**
 * https://medium.com/@tomgrohl/why-you-should-be-using-rule-objects-in-laravel-5-5-c2505e729b40
 * una abstract base rule
 * https://medium.com/@juampi92/laravel-5-5-validation-ruleception-rule-inside-rule-2762d2cf4471
 * collezione di rules
 * https://github.com/spatie/laravel-validation-rules/blob/master/src/Rules/ModelsExist.php.
 */
class StrongPasswordRule implements Rule
{
    protected int $minLength = 8;

    protected bool $needsNumber = true;

    protected bool $needsUppercaseLetter = true;

    protected bool $needsSpecialCharacter = true;

    /**
     * @return $this
     */
    public function minLength(int $minLength)
    {
        $this->minLength = $minLength;

        return $this;
    }

    /**
     * @return $this
     */
    public function needsNumber(bool $requires = true)
    {
        $this->needsNumber = $requires;

        return $this;
    }

    /**
     * @return $this
     */
    public function needsUppercaseLetter(bool $requires = true)
    {
        $this->needsUppercaseLetter = $requires;

        return $this;
    }

    /**
     * @return $this
     */
    public function needsSpecialCharacter(bool $requires = true)
    {
        $this->needsSpecialCharacter = $requires;

        return $this;
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param string $attribute
     * @param mixed  $value
     *
     * @return bool
     */
    public function passes($attribute, $value)
    {
        if (! \is_string($value)) {
            return false;
        }
        if (mb_strlen($value) < $this->minLength) {
            return false;
        }

        // Do we need at least 1 number
        if ($this->needsNumber && ! preg_match('/[0-9]{1,}/', $value)) {
            return false;
        }

        // Do we need at least 1 uppercase letter
        if ($this->needsUppercaseLetter && ! preg_match('/[A-Z]{1,}/', $value)) {
            return false;
        }

        if ($this->needsSpecialCharacter && ! preg_match('/[!@Â£\$%\^&\*\(\)_\+#\-\/\\\[\]\{\}\.,=~:;]{1,}/', $value)) {
            return false;
        }

        return true;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'The password entered in the :attribute field isn\'t strong enough';
    }
}
