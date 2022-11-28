<?php

declare(strict_types=1);

namespace Modules\LU\Models\Policies;

use Modules\Xot\Contracts\UserContract;
use Modules\Xot\Models\Policies\XotBasePolicy;

/**
 * Class UserPolicy.
 */
class UserPolicy extends XotBasePolicy {
    public function TestUsersWithLivewire(UserContract $user, \Illuminate\Database\Eloquent\Model $post): bool {
        return false;
    }

}
