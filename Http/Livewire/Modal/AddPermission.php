<?php

declare(strict_types=1);

namespace Modules\LU\Http\Livewire\Modal;

use Modules\LU\Models\Permission;
use Modules\Cms\Actions\GetViewAction;
use WireElements\Pro\Components\Modal\Modal;

class AddPermission extends Modal {
    public array $form_data = [];

    public function render() {
        $view = app(GetViewAction::class)->execute();

        return view($view);
    }

    public static function behavior(): array {
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

    public static function attributes(): array {
        return [
            // Set the modal size to 2xl, you can choose between:
            // xs, sm, md, lg, xl, 2xl, 3xl, 4xl, 5xl, 6xl, 7xl
            'size' => '2xl',
        ];
    }

    public function save(): void {
        Permission::create([
            'name' => $this->form_data['permission_name'],
        ]);
        session()->flash('message', 'ok');
    }
}
