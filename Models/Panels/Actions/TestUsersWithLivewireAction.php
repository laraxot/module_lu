<?php

declare(strict_types=1);

namespace Modules\LU\Models\Panels\Actions;

// -------- services --------
use Modules\Cms\Models\Panels\Actions\XotBasePanelAction;
use Modules\UI\Services\ThemeService;

// -------- bases -----------

/**
 * Class TestUsersWithLivewireAction.
 */
class TestUsersWithLivewireAction extends XotBasePanelAction {
    public bool $onContainer = true;

    public bool $onItem = false;
    // public string $icon = '<i class="fa fa-edit"></i>';

    // -- Perform the action on the given models.

    /**
     * @return mixed
     */
    public function handle() {
        // return $view;
        return $this->panel->view();

        // return ThemeService::v1iew($view)
        //    ->with('row', $this->row);
        // dddx($this->row);
    }

    public function postHandle(): void {
        dddx('postHandle');
        // dddx(get_defined_vars());
        /*
        $up = $this->updateRow();
        $this->setRow($up->row);

        return $this->handle();
        */
    }
}
