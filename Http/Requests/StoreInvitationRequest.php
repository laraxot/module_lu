<?php



namespace Modules\LU\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;
use Modules\Extend\Traits\FormRequestTrait;

class StoreInvitationRequest extends FormRequest
{
    use FormRequestTrait;
	/**
	 * Get the validation rules that apply to the request.
	 *
	 * @return array
	 */
	public function rules()
	{
	    return [
	        'email' => 'required|email|unique:invitations'
	    ];
	}

	/**
	 * Custom error messages.
	 *
	 * @return array
	 */
	public function messages()
	{
	    return [
	        'email.unique' => 'Invitation with this email address already requested.'
	    ];
	}
}