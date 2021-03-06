<?php

declare(strict_types=1);

namespace Modules\LU\Models\Panels;

//--- Services --
use Modules\Xot\Models\Panels\XotBasePanel;

/**
 * Class AreaAdminAreaPanel.
 */
class AreaAdminAreaPanel extends XotBasePanel {
    /**
     * The model the resource corresponds to.
     */
    protected static string $model = 'Modules\LU\Models\AreaAdminArea';

    /**
     * The single value that should be used to represent the resource when being displayed.
     */
    protected static string $title = 'title';

    /**
     * @return object[]
     */
    public function fields(): array {
        return [
            (object) [
                'type' => 'Id',
                'name' => 'id',
            ],
            (object) [
                'type' => 'Integer',
                //'type' => 'SelectTypeahead',
                'name' => 'area_id',
                'attributes' => ['data-url' => url('/admin/lu/it/area?q=%QUERY%&format=typeahead')],
            ],
            (object) [
                'type' => 'String',
                //'type' => 'SelectTypeahead',
                'name' => 'area.area_define_name',
                //'attributes' => ['data-url' => url('/admin/lu/it/area?q=%QUERY%&format=typeahead')],
            ],
            (object) [
                'type' => 'Integer',
                'name' => 'perm_user_id',
            ],
        ];
    }
}