<?php

declare(strict_types=1);

namespace Modules\LU\Http\Livewire\Profile;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Support\Renderable;

/**
 * Class Edit.
 */
class Edit extends Component {
    //public Model $profile;
   public array $form_data=[];

    public function mount(Model $profile): void{
        $this->form_data=$profile->toArray();
    }

    public function render(): Renderable {

        $view = 'lu::livewire.profile.edit';
        $view_params = [
            'view' => $view,
        ];

        return view()->make($view, $view_params);
    }

    public function save(): void{

        dddx('eccolo');
    }
}
