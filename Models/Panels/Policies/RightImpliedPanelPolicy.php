<?php
namespace Modules\LU\Models\Panels\Policies;

use Illuminate\Auth\Access\HandlesAuthorization;
use Modules\LU\Models\User as User;
use Modules\LU\Models\Panels\Policies\RightImpliedPanelPolicy as Panel;

use Modules\Xot\Models\Panels\Policies\XotBasePanelPolicy;

class RightImpliedPanelPolicy extends XotBasePanelPolicy {
}
