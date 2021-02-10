<?php

namespace Modules\LU\Models\Panels\Policies;

use Modules\Xot\Contracts\PanelContract;
use Modules\Xot\Contracts\UserContract;
use Modules\Xot\Models\Panels\Policies\XotBasePanelPolicy;

/**
 * Class UserPanelPolicy
 * @package Modules\LU\Models\Panels\Policies
 */
class UserPanelPolicy extends XotBasePanelPolicy {
    /**
     * @param UserContract $user
     * @param PanelContract $panel
     * @return bool
     */
    public function testUsersWithLivewire(UserContract $user, PanelContract $panel):bool {
        return false;
    }

    /**
     * @param UserContract $user
     * @param PanelContract $panel
     * @return bool
     */
    public function test(UserContract $user, PanelContract $panel):bool {
        return true;
    }
}
