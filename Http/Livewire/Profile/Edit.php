<?php

declare(strict_types=1);

namespace Modules\LU\Http\Livewire\Profile;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

/**
 * Class Edit.
 */
class Edit extends Component {
    //public Model $profile;
    public array $form_data = [];

    public function mount(Model $profile): void {
        $this->form_data = $profile->toArray();
        //dddx($this->form_data);
    }

    public function render(): Renderable {
        $view = 'lu::livewire.profile.edit';
        $view_params = [
            'view' => $view,
        ];

        return view()->make($view, $view_params);
    }

    public function save(): void {
        //dddx([$this->form_data, Auth::user()->profile]);
        $profile = Auth::user()->profile;
        $profile->update($this->form_data);

        $this->form_data['user']['email'] = $this->form_data['email'];
        Auth::user()->update($this->form_data['user']);

        dddx([$profile->toArray(), $this->form_data]);
    }
}
