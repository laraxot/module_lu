<<<<<<< HEAD
<?php

namespace Modules\LU\Models\Policies;

use Modules\Xot\Contracts\ModelContract;
use Modules\Xot\Contracts\UserContract;
use Modules\Xot\Models\Policies\XotBasePolicy;

/**
 * Class UserPolicy.
 */
class UserPolicy extends XotBasePolicy {
    /**
     * @return false
     */
    public function TestUsersWithLivewire(UserContract $user, ModelContract $post): bool {
        return false;
    }
}
=======
<?php

namespace Modules\LU\Models\Policies;

use Modules\Xot\Contracts\ModelContract;
use Modules\Xot\Contracts\UserContract;
use Modules\Xot\Models\Policies\XotBasePolicy;

/**
 * Class UserPolicy.
 */
class UserPolicy extends XotBasePolicy {
    /**
     * @return bool
     */
    public function TestUsersWithLivewire(UserContract $user, ModelContract $post): bool {
        return false;
    }
}
>>>>>>> ae14cf9 (first)
