<<<<<<< HEAD
<?php

namespace Modules\LU\Models\Panels;

//--- Services --
use Modules\Xot\Models\Panels\XotBasePanel;

/**
 * Class SocialProviderPanel
 * @package Modules\LU\Models\Panels
 */
class SocialProviderPanel extends XotBasePanel {
    /**
     * The model the resource corresponds to.
     *
     * @var string
     */
    protected static string $model = 'Modules\LU\Models\SocialProvider';

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
            (object) [
                'type' => 'String',
                'name' => 'user_id',
            ],
            (object) [
                'type' => 'String',
                'name' => 'user.handle',
            ],
            (object) [
                'type' => 'String',
                'name' => 'provider_id',
            ],
            (object) [
                'type' => 'String',
                'name' => 'provider',
            ],
            /*
            (object) array(
                'type' => 'String',
                'name' => 'token',
            ),
            */
        ];
    }
}
=======
<?php

declare(strict_types=1);

namespace Modules\LU\Models\Panels;

//--- Services --
use Modules\Xot\Models\Panels\XotBasePanel;

/**
 * Class SocialProviderPanel.
 */
class SocialProviderPanel extends XotBasePanel {
    /**
     * The model the resource corresponds to.
     */
    protected static string $model = 'Modules\LU\Models\SocialProvider';

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
                'type' => 'String',
                'name' => 'user_id',
            ],
            (object) [
                'type' => 'String',
                'name' => 'user.handle',
            ],
            (object) [
                'type' => 'String',
                'name' => 'provider_id',
            ],
            (object) [
                'type' => 'String',
                'name' => 'provider',
            ],
            /*
            (object) array(
                'type' => 'String',
                'name' => 'token',
            ),
            */
        ];
    }
}
>>>>>>> 3c191b8b6e72c4241b48547e7460883dfd14b26c
