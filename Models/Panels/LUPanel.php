<?php

declare(strict_types=1);

namespace Modules\LU\Models\Panels;

// --- Services --
use Modules\Xot\Models\Panels\XotBasePanel;

/**
 * Class LUPanel.
 */
class LUPanel extends XotBasePanel
{
    /**
     * The model the resource corresponds to.
     */
    protected static string $model = 'Modules\LU\Models\LU';

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
                'type' => 'Id',
                'name' => 'user_id',
                'rules' => 'required',
                'comment' => null,
            ],
            (object) [
                'type' => 'String',
                'name' => 'handle',
                'comment' => null,
            ],
        ];
    }
}
