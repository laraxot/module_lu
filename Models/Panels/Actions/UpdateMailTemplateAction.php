<?php

declare(strict_types=1);

namespace Modules\LU\Models\Panels\Actions;

// -------- models -----------

// -------- services --------
// -------- bases -----------
use Modules\Cms\Models\Panels\Actions\XotBasePanelAction;

/**
 * Class UpdateMailTemplateAction.
 */
class UpdateMailTemplateAction extends XotBasePanelAction {
    public bool $onItem = true;

    public string $icon = '<i class="fas fa-sync"></i>';

    public function handle() {
        $content = 'aa';
        $view_params = [
            'content' => $content,
        ];

        return $this->panel->view()->with($view_params);
    }
}
