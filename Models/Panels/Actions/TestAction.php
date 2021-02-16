<<<<<<< HEAD
<?php

namespace Modules\LU\Models\Panels\Actions;

//-------- services --------
use Modules\Xot\Models\Panels\Actions\XotBasePanelAction;

//-------- bases -----------

/**
 * Class TestAction
 * @package Modules\LU\Models\Panels\Actions
 */
class TestAction extends XotBasePanelAction {
    /**
     * @var bool
     */
    public bool $onContainer = true;

    /**
     * @var string
     */
    public string $icon = '<i class="fas fa-vial"></i>';

    /**
     * @return mixed
     */
    public function handle() {
        return $this->panel->view();
    }
}
=======
<?php

namespace Modules\LU\Models\Panels\Actions;

//-------- services --------
use Modules\Xot\Models\Panels\Actions\XotBasePanelAction;

//-------- bases -----------

/**
 * Class TestAction
 * @package Modules\LU\Models\Panels\Actions
 */
class TestAction extends XotBasePanelAction {
    /**
     * @var bool
     */
    public bool $onContainer = true;

    /**
     * @var string
     */
    public string $icon = '<i class="fas fa-vial"></i>';

    /**
     * @return mixed
     */
    public function handle() {
        return $this->panel->view();
    }
}
>>>>>>> ae14cf9 (first)
