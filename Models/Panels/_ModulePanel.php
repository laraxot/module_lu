<?php

declare(strict_types=1);

namespace Modules\LU\Models\Panels;

use Modules\Xot\Models\Panels\XotBasePanel;

/**
 * Class _ModulePanel.
 */
class _ModulePanel extends XotBasePanel
{
    public function actions(): array
    {
        return [
            new Actions\TestAction(),
            new Actions\UpdateMailTemplateAction(),
            new \Modules\Xot\Models\Panels\Actions\DbAction(),
        ];
    }
}