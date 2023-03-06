<?php

declare(strict_types=1);

namespace Modules\LU\Models\Panels\Actions;

// -------- models -----------

use Modules\Cms\Models\Panels\Actions\XotBasePanelAction;

// -------- services --------
// -------- bases -----------

/**
 * Class ChangePassword.
 */
class ChangePasswordAction extends XotBasePanelAction {
    public bool $onContainer = true;

    public string $icon = '<i class="fas fa-sync"></i>';

    /**
     * Perform the action.
     *
     * @return mixed
     */
    public function handle() {
        /**
         *  @phpstan-var view-string
         */
        $view = $this->panel->getView();

        $view_params = [
            'view' => $view,
        ];

        return view($view, $view_params);
    }

    public function postHandle() {
        $view = $this->panel->getView();

        $view_params = [
            'view' => $view,
        ];

        return view($view, $view_params);
    }
}
