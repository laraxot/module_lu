<?php

namespace Modules\LU\Models\Panels;

//--- Services --
use Modules\Xot\Models\Panels\XotBasePanel;

/**
 * Class GroupUserPanel
 * @package Modules\LU\Models\Panels
 */
class GroupUserPanel extends XotBasePanel {
    /**
     * The model the resource corresponds to.
     *
     * @var string
     */
    protected static string $model = 'Modules\LU\Models\GroupUser';

    /**
     * The single value that should be used to represent the resource when being displayed.
     *
     * @var string
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
                'name' => 'group_id',
                'rules' => 'required',
                'comment' => null,
            ]),
        ];
    }
}
