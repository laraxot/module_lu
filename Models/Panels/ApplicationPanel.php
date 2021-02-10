<?php

namespace Modules\LU\Models\Panels;

//--- Services --
use Modules\Xot\Models\Panels\XotBasePanel;

/**
 * Class ApplicationPanel
 * @package Modules\LU\Models\Panels
 */
class ApplicationPanel extends XotBasePanel {
    /**
     * The model the resource corresponds to.
     *
     * @var string
     */
    protected static string $model = 'Modules\LU\Models\Application';

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
                'name' => 'application_id',
                'rules' => 'required',
                'comment' => null,
            ]),
            (object) ([
                'type' => 'String',
                'name' => 'application_define_name',
                'rules' => 'required',
                'comment' => null,
            ]),
        ];
    }
}
