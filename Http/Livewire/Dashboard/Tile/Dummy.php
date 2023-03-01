<?php

declare(strict_types=1);

namespace Modules\LU\Http\Livewire\Dashboard\Tile;

use Illuminate\Contracts\Support\Renderable;
use Livewire\Component;
use Modules\Cms\Actions\GetViewAction;

/**
 * Class Dummy.
 */
class Dummy extends Component {
    /** @var string */
    public $position;

    /**
     * Undocumented function.
     *
     * @return void
     */
    public function mount(string $position) {
        $this->position = $position;
    }

    /**
     * Undocumented function.
     */
    public function render(): Renderable {
        /**
         * @phpstan-var view-string
         */
        $view = app(GetViewAction::class)->execute();

        return view($view);
    }
}
