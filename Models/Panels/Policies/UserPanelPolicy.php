<?php

declare(strict_types=1);

namespace Modules\LU\Models\Panels\Policies;

use Modules\Cms\Contracts\PanelContract;
use Modules\Cms\Models\Panels\Policies\XotBasePanelPolicy;
use Modules\Xot\Contracts\UserContract;

/**
 * Class UserPanelPolicy.
 */
class UserPanelPolicy extends XotBasePanelPolicy
{
    public function testUsersWithLivewire(UserContract $user, PanelContract $panel): bool
    {
        return false;
    }

    public function test(UserContract $user, PanelContract $panel): bool
    {
        return true;
    }
}
