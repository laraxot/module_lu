<?php

declare(strict_types=1);

namespace Modules\LU\Http\Livewire\Dashboard\Tile;

use Exception;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

/**
 * Class Dummy.
 */
class Dummy extends Component {
    /** @var string */
    public $position;

    /**
     * Undocumented function
     *
     * @param string $position
     * @return void
     */
    public function mount(string $position){
        $this->position = $position;
    }

    /**
     * Undocumented function
     *
     * @return Renderable
     */
    public function render():Renderable{
        /**
         * @phpstan-var view-string
         */
        $view='lu::livewire.dashboard.tile.dummy';
        return view($view);
    }
}