<?php

declare(strict_types=1);

namespace Modules\LU\Models\Panels;

// --- Services --

use Modules\LU\Models\Right;
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
     * on select the option label.
     */
    /*
    public function optionLabel($row): string {
        $returnRightName = Right::find($row->right_id);

        if (! empty($returnRightName)) {
            $returnRightName = $returnRightName->get()->first()->right_define_name;
        } else {
            $returnRightName = 'Avviso. Diritto '.$row->right_id.' non presente su tabella Rights';
        }

        return $returnRightName;
    }
    */
    /**
     * @return object[]
     */
    public function fields(): array {
        return [
            (object) [
                'type' => 'Integer',
                'name' => 'perm_user_id',
                'rules' => 'required',
                'comment' => null,
            ],
            (object) [
                'type' => 'Integer',
                'name' => 'right_id',
                'rules' => 'required',
                'comment' => null,
            ],
            (object) [
                'type' => 'Boolean',
                'name' => 'right_level',
                'comment' => null,
            ],
        ];
    }
}
