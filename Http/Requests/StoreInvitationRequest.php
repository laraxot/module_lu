<<<<<<< HEAD
<?php

namespace Modules\LU\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;
use Modules\Xot\Traits\FormRequestTrait;

/**
 * Class StoreInvitationRequest
 * @package Modules\LU\Http\Requests
 */
class StoreInvitationRequest extends FormRequest {
    use FormRequestTrait;

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules() {
        return [
            'email' => 'required|email|unique:invitations',
        ];
    }

    /**
     * Custom error messages.
     *
     * @return array
     */
    public function messages() {
        return [
            'email.unique' => 'Invitation with this email address already requested.',
        ];
    }
}
=======
<?php

declare(strict_types=1);

namespace Modules\LU\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;
use Modules\Xot\Traits\FormRequestTrait;

/**
 * Class StoreInvitationRequest.
 */
class StoreInvitationRequest extends FormRequest {
    use FormRequestTrait;

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules() {
        return [
            'email' => 'required|email|unique:invitations',
        ];
    }

    /**
     * Custom error messages.
     *
     * @return array
     */
    public function messages() {
        return [
            'email.unique' => 'Invitation with this email address already requested.',
        ];
    }
}
>>>>>>> 3c191b8b6e72c4241b48547e7460883dfd14b26c
