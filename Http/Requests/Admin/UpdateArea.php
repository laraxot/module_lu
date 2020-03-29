<?php

namespace Modules\LU\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;
use Modules\Xot\Traits\FormRequestTrait;

class UpdateArea extends FormRequest {
    use FormRequestTrait;

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize() {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules() {
        return [
        ];
    }
}
