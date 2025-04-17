<?php

declare(strict_types=1);

namespace Modules\LU\Models\Panels;

// --- Services --
use Modules\Cms\Models\Panels\XotBasePanel;

/**
 * Class ApplicationPanel.
 */
class ApplicationPanel extends XotBasePanel
{
    /**
     * The model the resource corresponds to.
     */
    protected static string $model = 'Modules\LU\Models\Application';

    /**
     * The single value that should be used to represent the resource when being displayed.
     */
    protected static string $title = 'title';

    /**
     * @return object[]
     */
    public function fields(): array
    {
        return [
            (object) [
                'type' => 'Id',
                'name' => 'id',
                'comment' => null,
            ],
            (object) [
                'type' => 'String',
                'name' => 'application_define_name',
                'rules' => 'required',
                'comment' => null,
            ],
        ];
    }
}
