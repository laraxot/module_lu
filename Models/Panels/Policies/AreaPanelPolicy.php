<<<<<<< HEAD
<?php

declare(strict_types=1);

namespace Modules\LU\Models\Panels\Policies;

use Modules\Xot\Contracts\PanelContract;
use Modules\Xot\Contracts\UserContract;
use Modules\Xot\Models\Panels\Policies\XotBasePanelPolicy;

/**
 * Class AreaPanelPolicy.
 */
class AreaPanelPolicy extends XotBasePanelPolicy {
    public function TestUsersWithLivewire(UserContract $user, PanelContract $panel): bool {
        return false;
    }

    public function syncAreas(UserContract $user, PanelContract $panel): bool {
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
 * Class AreaPanelPolicy.
 */
class AreaPanelPolicy extends XotBasePanelPolicy {
    public function TestUsersWithLivewire(UserContract $user, PanelContract $panel): bool {
        return false;
    }

    public function syncAreas(UserContract $user, PanelContract $panel): bool {
        return true;
    }
}
>>>>>>> 3c191b8b6e72c4241b48547e7460883dfd14b26c
