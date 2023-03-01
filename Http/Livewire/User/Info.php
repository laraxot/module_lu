<?php

declare(strict_types=1);

namespace Modules\LU\Http\Livewire\User;

use Livewire\Component;
use Modules\Cms\Actions\GetViewAction;
use Modules\LU\Services\ProfileService;
use Illuminate\Contracts\Support\Renderable;

/**
 * Class Edit.
 */
class Info extends Component {
    public array $form_data = [];
    public bool $show = false;
    public string $model_class;
    public int $model_id;

    protected array $rules = [
        'form_data.passwd' => 'required|min:6|confirmed',
        // 'email' => 'required|email',
    ];

    public function mount(): void {
        $model = ProfileService::make()->getUser();
        $this->model_class = get_class($model);
        $model_id = $model->getKey();
        if (! is_int($model_id)) {
            throw new \Exception('['.__LINE__.']['.__FILE__.']');
        }
        $this->model_id = $model_id;
        // $this->form_data = $model->toArray();
    }

    public function render(): Renderable {
        /**
         * @phpstan-var view-string
         */
        $view = app(GetViewAction::class)->execute();
        $view_params = [
            'view' => $view,
        ];

        return view($view, $view_params);
    }

    public function toggle(): void {
        $this->show = ! $this->show;
    }

    public function update(): void {
        $this->validate();
        $model = app($this->model_class)->find($this->model_id);

        $model->update($this->form_data);
        session()->flash('message', 'successfully updated.');
    }
}
