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
     * @return bool
     */
    public function TestUsersWithLivewire(UserContract $user, ModelContract $post): bool {
        return false;
    }
}
=======
<?php

declare(strict_types=1);

namespace Modules\LU\Models\Policies;

use Modules\Xot\Contracts\ModelContract;
use Modules\Xot\Contracts\UserContract;
use Modules\Xot\Models\Policies\XotBasePolicy;

/**
 * Class UserPolicy.
 */
class UserPolicy extends XotBasePolicy {
    public function TestUsersWithLivewire(UserContract $user, ModelContract $post): bool {
        return false;
    }
}
>>>>>>> 3c191b8b6e72c4241b48547e7460883dfd14b26c
