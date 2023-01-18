<?php

declare(strict_types=1);

namespace Modules\LU\Http\Livewire\Dashboard\Tile;

use Illuminate\Contracts\Support\Renderable;
use Livewire\Component;

/**
 * Class Dummy.
 */
class Dummy extends Component
{
    /** @var string */
    public $position;

    /**
     * Undocumented function.
     *
     * @return void
     */
    public function mount(string $position)
    {
        $this->position = $position;
    }

    /**
     * Undocumented function.
     */
    public function render(): Renderable
    {
        /**
         * @phpstan-var view-string
         */
        $view = 'lu::livewire.dashboard.tile.dummy';

        return view($view);
    }
}
