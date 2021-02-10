<?php

namespace Modules\LU\Models\Panels;

//--- Services --
use Modules\Xot\Models\Panels\XotBasePanel;

/**
 * Class LUPanel
 * @package Modules\LU\Models\Panels
 */
class LUPanel extends XotBasePanel {
    /**
     * The model the resource corresponds to.
     *
     * @var string
     */
    protected static string $model = 'Modules\LU\Models\LU';

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
                'type' => 'Id',
                'name' => 'auth_user_id',
                'rules' => 'required',
                'comment' => null,
            ]),
            (object) ([
                'type' => 'String',
                'name' => 'handle',
                'comment' => null,
            ]),
        ];
    }
}
