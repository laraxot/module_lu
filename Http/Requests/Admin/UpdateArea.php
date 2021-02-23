<<<<<<< HEAD
<?php

namespace Modules\LU\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;
use Modules\Xot\Traits\FormRequestTrait;

/**
 * Class UpdateArea
 * @package Modules\LU\Http\Requests\Admin
 */
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
=======
<?php

declare(strict_types=1);

namespace Modules\LU\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;
use Modules\Xot\Traits\FormRequestTrait;

/**
 * Class UpdateArea.
 */
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
>>>>>>> 3c191b8b6e72c4241b48547e7460883dfd14b26c
