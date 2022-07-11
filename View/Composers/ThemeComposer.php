<?php

declare(strict_types=1);

namespace Modules\LU\View\Composers;

use Modules\LU\Models\User;
use Modules\Mediamonitor\Models\Press;
use Modules\Mediamonitor\Models\Channel;
use Illuminate\Database\Eloquent\Collection;

class ThemeComposer {
    /**
     * Undocumented function.
     */
    public function lastLoggedUsers(array $params): Collection {
        $limit=$params[0];
        $latest = User::latest()
            ->limit($limit)
            ->get();

        return $latest;
    }

    
}