<?php

declare(strict_types=1);

namespace Modules\LU\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Modules\LU\Models\User;

/**
 * Class ProfileRequest.
 */
class ProfileRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return auth()->check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => ['required', 'min:3'],
            'email' => ['required', 'email', Rule::unique((new User())->getTable())->ignore(auth()->id())],
            'photo' => ['nullable', 'image'],
        ];
    }
}
