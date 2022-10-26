<?php

declare(strict_types=1);

namespace Modules\LU\View\Composers;

use Illuminate\Database\Eloquent\Collection;
use Modules\LU\Models\User;

class ThemeComposer {
    /**
     * Undocumented function.
     */
    public function lastLoggedUsers(int $limit): Collection {
        $latest = User::orderByDesc('last_login_at')
            ->limit($limit)
            ->get();

        return $latest;
    }
}
