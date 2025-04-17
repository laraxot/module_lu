<?php

declare(strict_types=1);

namespace Modules\LU\Models\Panels;

// --- Services --
use Modules\Cms\Models\Panels\XotBasePanel;

/**
 * Class PermUserPanel.
 */
class PermUserPanel extends XotBasePanel
{
    /**
     * The model the resource corresponds to.
     */
    protected static string $model = 'Modules\LU\Models\PermUser';

    /**
     * The single value that should be used to represent the resource when being displayed.
     */
    protected static string $title = 'title';

    /**
     * @return object[]
     */
    public function fields(): array
    {
        return [
            (object) [
                'type' => 'Integer',
                'name' => 'user_id',
                // 'rules' => 'required',
                'comment' => null,
            ],
            (object) [
                'type' => 'Integer',
                'name' => 'perm_type',
                'comment' => null,
            ],
        ];
    }
}
