<?php

declare(strict_types=1);

namespace Modules\LU\Models\Panels;

// --- Services --
use Illuminate\Database\Eloquent\Model;
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
     * on select the option label.
     */
    public function optionLabel(Model $row): string {
        // return $row->matr.' ['.$row->email.']['.$row->ha_diritto.'] '.$row->cognome.' '.$row->cognome.' ';
        return $row->getAttributeValue('right_define_name').''; // matr.' ['.$row->email.']['.$row->ha_diritto.'] '.$row->cognome.' '.$row->cognome.' ';
    }

    /**
     * @return object[]
     */
    public function fields(): array {
        return [
            (object) ([
                'type' => 'Id',
                'name' => 'id',
                'comment' => null,
            ]),
            (object) ([
                'type' => 'Integer',
                'name' => 'area_id',

                'comment' => null,
            ]),
            (object) ([
                'type' => 'String',
                'name' => 'right_define_name',

                'comment' => null,
            ]),
            (object) ([
                'type' => 'String',
                'name' => 'has_implied',

                'comment' => null,
            ]),
            (object) ([
                'type' => 'String',
                'name' => 'has_level',

                'comment' => null,
            ]),
        ];
    }
}
