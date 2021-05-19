<?php

namespace Modules\LU\Models\Panels;

use Modules\Xot\Models\Panels\Actions\ArtisanAction;
use Modules\Xot\Models\Panels\XotBasePanel;

/**
 * Class HomePanel.
 */
class HomePanel extends XotBasePanel {
    public static string $model = 'Modules\Xot\Models\Home';

    public function actions(): array {
        return [
            //new Actions\FullcalendarAction(),
            //new Actions\TestAction(),
            new ArtisanAction(),
        ];
    }
}