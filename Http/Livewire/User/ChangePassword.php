<?php

declare(strict_types=1);

namespace Modules\LU\Http\Livewire\User;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rules\Password;
use Livewire\Component;
use Modules\Cms\Actions\GetViewAction;
use Modules\LU\Models\User;
use Modules\LU\Rules\CurrentPasswordCheckRule;

/**
 * Class Edit.
 */
class ChangePassword extends Component
{
    public array $form_data = [];
    public string $user_id = '';

    public function mount(): void
    {
        $this->user_id = (string) Auth::id();
        $this->form_data['old_password'] = '';
        $this->form_data['passwd'] = '';
        $this->form_data['confirm_password'] = '';
    }

    public function rules(): array
    {
        return [
            'form_data.old_password' => ['required', 'min:6', new CurrentPasswordCheckRule()],
            'form_data.passwd' => [
                'required',
                Password::min(8)
                    ->mixedCase()
                    ->numbers()
                    ->symbols()
                    ->uncompromised(),
            ],
            'form_data.confirm_password' => [
                'required',
                'same:form_data.passwd',
            ],
        ];
    }

    public function render(): Renderable
    {
        /**
         * @phpstan-var view-string
         */
        $view = app(GetViewAction::class)->execute();
        $view_params = [
            'view' => $view,
        ];

        return view($view, $view_params);
    }

    public function save(): void
    {
        $this->validate($this->rules());

        User::find($this->user_id)->update($this->form_data);
        session()->flash('message', 'successfully updated.');
    }
}
