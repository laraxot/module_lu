<?php

declare(strict_types=1);

namespace Modules\LU\Models\Panels;

// --- Services --

use Modules\Cms\Models\Panels\XotBasePanel;

/**
 * Class RightImpliedPanel.
 */
class RightImpliedPanel extends XotBasePanel {
    /**
     * The model the resource corresponds to.
     */
    public static string $model = 'Modules\LU\Models\RightImplied';

    /**
     * The single value that should be used to represent the resource when being displayed.
     */
    public static string $title = 'title';

    /**
     * @return object[]
     */
    public function fields(): array {
        return [
            (object) [
                'type' => 'Integer',
                'name' => 'right_id',
                'rules' => 'required',
                'comment' => null,
            ],
            (object) [
                'type' => 'Integer',
                'name' => 'implied_right_id',
                'rules' => 'required',
                'comment' => null,
            ],
        ];
    }
}
