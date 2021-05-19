<?php

declare(strict_types=1);

namespace Modules\LU\Models\Panels;

//--- Services --
use Modules\Xot\Models\Panels\XotBasePanel;

/**
 * Class RightPanel.
 */
class RightPanel extends XotBasePanel {
    /**
     * The model the resource corresponds to.
     */
    protected static string $model = 'Modules\LU\Models\Right';

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
                'name' => 'right_id',
                'rules' => 'required',
                'comment' => null,
            ]),
            (object) ([
                'type' => 'Integer',
                'name' => 'area_id',
                'rules' => 'required',
                'comment' => null,
            ]),
            (object) ([
                'type' => 'String',
                'name' => 'right_define_name',
                'rules' => 'required',
                'comment' => null,
            ]),
            (object) ([
                'type' => 'String',
                'name' => 'has_implied',
                'rules' => 'required',
                'comment' => null,
            ]),
            (object) ([
                'type' => 'String',
                'name' => 'has_level',
                'rules' => 'required',
                'comment' => null,
            ]),
        ];
    }
}