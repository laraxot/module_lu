<?php

declare(strict_types=1);

namespace Modules\LU\Http\Livewire\Modal;

use Illuminate\Contracts\Support\Renderable;
use Modules\Cms\Actions\GetViewAction;
use Modules\LU\Models\Role;
<<<<<<< HEAD
use Modules\Wire\View\Components\Modal\Modal;
=======
use Modules\Modal\View\Components\Modal\Modal;
>>>>>>> 229bf29 (up)

class AddRole extends Modal
{
    public array $form_data = [];

    public function render(): Renderable
    {
        $view = app(GetViewAction::class)->execute();

        return view($view);
    }

    public static function behavior(): array
    {
        return [
            // Close the modal if the escape key is pressed
            'close-on-escape' => true,
            // Close the modal if someone clicks outside the modal
            'close-on-backdrop-click' => true,
            // Trap the users focus inside the modal (e.g. input autofocus and going back and forth between input fields)
            'trap-focus' => true,
            // Remove all unsaved changes once someone closes the modal
            'remove-state-on-close' => false,
        ];
    }

    public static function attributes(): array
    {
        return [
            // Set the modal size to 2xl, you can choose between:
            // xs, sm, md, lg, xl, 2xl, 3xl, 4xl, 5xl, 6xl, 7xl
            'size' => '2xl',
        ];
    }

    public function save(): void
    {
        Role::create([
            'name' => $this->form_data['role_name'],
        ]);
        session()->flash('message', 'ok');
    }
}
