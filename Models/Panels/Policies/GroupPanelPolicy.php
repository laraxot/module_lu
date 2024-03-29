<?php

declare(strict_types=1);

namespace Modules\LU\Models\Panels\Policies;

use Modules\Cms\Contracts\PanelContract;
use Modules\Cms\Models\Panels\Policies\XotBasePanelPolicy;
use Modules\Xot\Contracts\UserContract;

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
