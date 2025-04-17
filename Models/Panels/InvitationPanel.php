<?php

declare(strict_types=1);

namespace Modules\LU\Models\Panels;

// --- Services --
use Modules\Cms\Models\Panels\XotBasePanel;

/**
 * Class InvitationPanel.
 */
class InvitationPanel extends XotBasePanel
{
    /**
     * The model the resource corresponds to.
     */
    protected static string $model = 'Modules\LU\Models\Invitation';

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
                'type' => 'String',
                'name' => 'email',
                'rules' => 'required',
                'comment' => null,
            ],
            (object) [
                'type' => 'String',
                'name' => 'invitation_token',
                'comment' => null,
            ],
            (object) [
                'type' => 'DateDateTime',
                'name' => 'registered_at',
                'comment' => null,
            ],
        ];
    }
}
