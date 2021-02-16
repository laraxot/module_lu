<<<<<<< HEAD
<?php

namespace Modules\LU\Models\Panels;

//--- Services --
use Modules\Xot\Models\Panels\XotBasePanel;

/**
 * Class RightPanel
 * @package Modules\LU\Models\Panels
 */
class RightPanel extends XotBasePanel {
    /**
     * The model the resource corresponds to.
     *
     * @var string
     */
    protected static string $model = 'Modules\LU\Models\Right';

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
=======
<?php

namespace Modules\LU\Models\Panels;

//--- Services --
use Modules\Xot\Models\Panels\XotBasePanel;

/**
 * Class RightPanel
 * @package Modules\LU\Models\Panels
 */
class RightPanel extends XotBasePanel {
    /**
     * The model the resource corresponds to.
     *
     * @var string
     */
    protected static string $model = 'Modules\LU\Models\Right';

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
>>>>>>> ae14cf9 (first)
