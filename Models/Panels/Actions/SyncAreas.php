<?php

declare(strict_types=1);

namespace Modules\LU\Models\Panels\Actions;

// -------- models -----------

use Modules\LU\Models\Area;
use Modules\LU\Models\PermUser;
// -------- services --------
// -------- bases -----------
use Modules\Cms\Models\Panels\Actions\XotBasePanelAction;
use Nwidart\Modules\Facades\Module;

/**
 * Class SyncAreas.
 */
class SyncAreas extends XotBasePanelAction {
    public bool $onContainer = true;

    public string $icon = '<i class="fas fa-sync"></i>';

    /**
     * Perform the action.
     *
     * @return mixed
     */
    public function handle() {
        // to do
        $modules = Module::all(); // li da tutti o solo quelli attivi ?

        foreach ($modules as $mod) {
            echo '<br/>'.$mod->getName();
            $area = Area::query()->firstOrCreate(['area_define_name' => $mod->getName()]);
            $supers = PermUser::query()->where('perm_type', '>=', 5)->get();
            foreach ($supers as $super) {
                $super->areas()->syncWithoutDetaching([$area->id]);
            }
        }

        return '<h3>+Done</h3>';
    }

    // end handle
}
