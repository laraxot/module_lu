<?php

declare(strict_types=1);

namespace Modules\LU\Models\Panels;

// --- Services --

use Modules\Cms\Models\Panels\XotBasePanel;

/**
 * Class GroupSubgroupPanel.
 */
class GroupSubgroupPanel extends XotBasePanel {
    /**
     * The model the resource corresponds to.
     */
    public static string $model = 'Modules\LU\Models\GroupSubgroup';

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
                'name' => 'group_id',
                'rules' => 'required',
                'comment' => null,
            ],
            (object) [
                'type' => 'Integer',
                'name' => 'subgroup_id',
                'rules' => 'required',
                'comment' => null,
            ],
        ];
    }
}
