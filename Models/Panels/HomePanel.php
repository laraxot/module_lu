<?php

declare(strict_types=1);

namespace Modules\LU\Models\Panels;

use Modules\Cms\Models\Panels\Actions\ArtisanAction;
use Modules\Cms\Models\Panels\XotBasePanel;

/**
 * Class HomePanel.
 */
class HomePanel extends XotBasePanel {
    public static string $model = 'Modules\Xot\Models\Home';

    public function actions(): array {
        // $cmd = (string) request()->input('cmd');
        /**
         * @var string
         */
        $cmd = request('cmd', '');

        return [
            // new Actions\FullcalendarAction(),
            // new Actions\TestAction(),
            new ArtisanAction($cmd),
        ];
    }
}
