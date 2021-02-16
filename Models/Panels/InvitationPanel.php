<<<<<<< HEAD
<?php

namespace Modules\LU\Models\Panels;

//--- Services --
use Modules\Xot\Models\Panels\XotBasePanel;

/**
 * Class InvitationPanel
 * @package Modules\LU\Models\Panels
 */
class InvitationPanel extends XotBasePanel {
    /**
     * The model the resource corresponds to.
     *
     * @var string
     */
    protected static string $model = 'Modules\LU\Models\Invitation';

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
                'type' => 'String',
                'name' => 'email',
                'rules' => 'required',
                'comment' => null,
            ]),
            (object) ([
                'type' => 'String',
                'name' => 'invitation_token',
                'comment' => null,
            ]),
            (object) ([
                'type' => 'DateTime',
                'name' => 'registered_at',
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
 * Class InvitationPanel
 * @package Modules\LU\Models\Panels
 */
class InvitationPanel extends XotBasePanel {
    /**
     * The model the resource corresponds to.
     *
     * @var string
     */
    protected static string $model = 'Modules\LU\Models\Invitation';

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
                'type' => 'String',
                'name' => 'email',
                'rules' => 'required',
                'comment' => null,
            ]),
            (object) ([
                'type' => 'String',
                'name' => 'invitation_token',
                'comment' => null,
            ]),
            (object) ([
                'type' => 'DateTime',
                'name' => 'registered_at',
                'comment' => null,
            ]),
        ];
    }
}
>>>>>>> ae14cf9 (first)
