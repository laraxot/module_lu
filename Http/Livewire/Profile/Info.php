<?php

declare(strict_types=1);

namespace Modules\LU\Http\Livewire\Profile;

use Exception;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Modules\Cms\Actions\GetViewAction;
use Modules\LU\Services\ProfileService;
use Illuminate\Contracts\Support\Renderable;

/**
 * Class Edit.
 */
class Info extends Component
{
    public array $form_data = [];

    public bool $show = false;

    public string $model_class;
    public int $model_id;

    public function mount(): void
    {
        $profile = ProfileService::make()->getProfile();
        if (null == $profile) {
            throw new Exception('['.__LINE__.']['.__FILE__.']');
        }
        $this->model_class = get_class($profile);
        $model_id = $profile->getKey();
        if (! is_int($model_id)) {
            throw new Exception('['.__LINE__.']['.__FILE__.']');
        }
        $this->model_id = $model_id;
        $this->form_data = $profile->toArray();
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

    public function toggle(): void
    {
        $this->show = ! $this->show;
    }

    public function update(): void
    {
        $model = app($this->model_class)->find($this->model_id);
        $model->update($this->form_data);
        session()->flash('message', 'successfully updated.');
    }

    /*
    public function save(): void {
        // dddx([$this->form_data, Auth::user()->profile]);
        if (null === Auth::user()) {
            throw new Exception('['.__LINE__.']['.class_basename(__CLASS__).']');
        }
        $profile = Auth::user()->profile;
        if (null === $profile) {
            throw new Exception('['.__LINE__.']['.class_basename(__CLASS__).']');
        }
        $profile->update($this->form_data);

        $this->form_data['user']['email'] = $this->form_data['email'];
        Auth::user()->update($this->form_data['user']);

        dddx([$profile->toArray(), $this->form_data]);
    }
    */
}
