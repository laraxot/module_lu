<?php

declare(strict_types=1);

namespace Modules\LU\Models\Panels\Policies;

use Modules\Xot\Contracts\PanelContract;
use Modules\Xot\Contracts\UserContract;
use Modules\Xot\Models\Panels\Policies\XotBasePanelPolicy;

/**
 * Class GroupPanelPolicy.
 */
class GroupPanelPolicy extends XotBasePanelPolicy
{
    public function attach(UserContract $user, PanelContract $panel): bool
    {
        return true;
    }
}
