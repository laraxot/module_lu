<?php

namespace Modules\LU\Models\Panels\Policies;

use Modules\Xot\Contracts\PanelContract;
use Modules\Xot\Contracts\UserContract;
use Modules\Xot\Models\Panels\Policies\XotBasePanelPolicy;

/**
 * Class GroupPanelPolicy.
 */
class GroupPanelPolicy extends XotBasePanelPolicy {
    /**
     * @return bool
     */
    public function attach(UserContract $user, PanelContract $panel): bool {
        return true;
    }
}
