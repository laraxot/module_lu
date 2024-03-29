<?php

declare(strict_types=1);

namespace Modules\LU\Http\Livewire\User;

use Illuminate\Contracts\Support\Renderable;
use Livewire\Component;
use Modules\Cms\Actions\GetViewAction;
use Modules\LU\Services\ProfileService;

/**
 * Class Edit.
 */
class Info extends Component
{
    public array $form_data = [];
    public bool $show = false;
    public string $model_class;
    public string $model_id;

    protected array $rules = [
        'form_data.passwd' => 'required|min:6|confirmed',
        // 'email' => 'required|email',
    ];

    public function mount(): void
    {
        $model = ProfileService::make()->getUser();
        $this->model_class = get_class($model);

        /**
         * @var string $model_key
         */
        $model_key = $model->getKey();
        $this->model_id = strval($model_key);
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
        $this->validate();
        $model = app($this->model_class)->find($this->model_id);

        $model->update($this->form_data);
        session()->flash('message', 'successfully updated.');
    }
}
