<?php

declare(strict_types=1);

namespace Modules\LU\Models\Panels\Actions;

// -------- services --------
use Modules\Cms\Models\Panels\Actions\XotBasePanelAction;

// -------- bases -----------

/**
 * Class TestAction.
 */
class TestAction extends XotBasePanelAction {
    public bool $onContainer = true;

    // public bool $onItem = true;//?_act=test#[143][C:\var\www\base_gamma\laravel\Modules\Cms\Services\PanelRouteService.php][Route [admin.show] not defined.]

    public string $icon = '<i class="fas fa-vial">Test</i>';

    /**
     * @return mixed
     */
    public function handle() {
        return 'preso';
        // return $this->panel->view();
    }
}
