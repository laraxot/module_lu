<?php

declare(strict_types=1);

namespace Modules\LU\Models\Panels\Policies;

use Modules\Cms\Contracts\PanelContract;
use Modules\Xot\Contracts\UserContract;
use Modules\Cms\Models\Panels\Policies\XotBasePanelPolicy;

/**
 * Class AreaPanelPolicy.
 */
class AreaPanelPolicy extends XotBasePanelPolicy {
    public function TestUsersWithLivewire(UserContract $user, PanelContract $panel): bool {
        return false;
    }

    public function syncAreas(UserContract $user, PanelContract $panel): bool {
        return true;
    }
}
