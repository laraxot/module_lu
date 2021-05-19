<?php

declare(strict_types=1);

namespace Modules\LU\Models\Panels;

//--- Services --
use Modules\Xot\Models\Panels\XotBasePanel;

/**
 * Class UserRightPanel.
 */
class UserRightPanel extends XotBasePanel {
    /**
     * The model the resource corresponds to.
     */
    protected static string $model = 'Modules\LU\Models\UserRight';

    /**
     * The single value that should be used to represent the resource when being displayed.
     */
    protected static string $title = 'title';

    /**
     * @return object[]
     */
    public function fields(): array {
        return [
            (object) ([
                'type' => 'Integer',
                'name' => 'perm_user_id',
                'rules' => 'required',
                'comment' => null,
            ]),
            (object) ([
                'type' => 'Integer',
                'name' => 'right_id',
                'rules' => 'required',
                'comment' => null,
            ]),
            (object) ([
                'type' => 'Boolean',
                'name' => 'right_level',
                'comment' => null,
            ]),
        ];
    }
}