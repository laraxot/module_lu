<<<<<<< HEAD
<?php

namespace Modules\LU\Models\Panels\Policies;

use Modules\Xot\Contracts\PanelContract;
use Modules\Xot\Contracts\UserContract;
use Modules\Xot\Models\Panels\Policies\XotBasePanelPolicy;

/**
 * Class GroupPanelPolicy.
 */
class GroupPanelPolicy extends XotBasePanelPolicy {
    /**
     * @return bool
     */
    public function attach(UserContract $user, PanelContract $panel): bool {
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
 * Class GroupPanelPolicy.
 */
class GroupPanelPolicy extends XotBasePanelPolicy {
    public function attach(UserContract $user, PanelContract $panel): bool {
        return true;
    }
}
>>>>>>> 3c191b8b6e72c4241b48547e7460883dfd14b26c
