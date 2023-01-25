<?php

declare(strict_types=1);

namespace Modules\LU\Models\Policies;

use Modules\Cms\Models\Panels\Policies\XotBasePanelPolicy;
use Modules\Xot\Contracts\UserContract;

/**
 * Class UserPolicy.
 */
class UserPolicy extends XotBasePanelPolicy
{
    public function TestUsersWithLivewire(UserContract $user, \Illuminate\Database\Eloquent\Model $post): bool
    {
        return false;
    }
}
