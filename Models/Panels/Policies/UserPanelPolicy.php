<<<<<<< HEAD
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
=======
<?php

declare(strict_types=1);

namespace Modules\LU\Models\Panels\Policies;

use Modules\Xot\Contracts\PanelContract;
use Modules\Xot\Contracts\UserContract;
use Modules\Xot\Models\Panels\Policies\XotBasePanelPolicy;

/**
 * Class UserPanelPolicy.
 */
class UserPanelPolicy extends XotBasePanelPolicy {
    public function testUsersWithLivewire(UserContract $user, PanelContract $panel): bool {
        return false;
    }

    public function test(UserContract $user, PanelContract $panel): bool {
        return true;
    }
}
>>>>>>> 3c191b8b6e72c4241b48547e7460883dfd14b26c
