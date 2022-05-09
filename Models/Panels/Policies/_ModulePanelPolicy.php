<?php

declare(strict_types=1);

namespace Modules\LU\Models\Panels\Policies;

use Modules\Xot\Contracts\PanelContract;
use Modules\Xot\Contracts\UserContract;
use Modules\Xot\Models\Panels\Policies\XotBasePanelPolicy;

class _ModulePanelPolicy extends XotBasePanelPolicy
{
    public function test(UserContract $user, PanelContract $panel): bool
    {
        return true;
    }

    public function updateMailTemplate(UserContract $user, PanelContract $panel): bool
    {
        return true;
    }

    public function db(UserContract $user, PanelContract $panel): bool
    {
        return true;
    }
}