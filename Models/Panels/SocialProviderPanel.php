<?php

declare(strict_types=1);

namespace Modules\LU\Models\Panels;

// --- Services --
use Modules\Cms\Models\Panels\XotBasePanel;

/**
 * Class SocialProviderPanel.
 */
class SocialProviderPanel extends XotBasePanel
{
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
    public function fields(): array
    {
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
