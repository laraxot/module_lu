<?php

declare(strict_types=1);

namespace Modules\LU\View\Composers;

use Modules\LU\Models\User;
use Illuminate\Database\Eloquent\Collection;

class ThemeComposer
{
    /**
     * Undocumented function.
     */
    public function lastLoggedUsers(int $limit): Collection
    {

        $latest = User::orderByDesc('last_login_at')
            ->limit($limit)
            ->get();

        return $latest;
    }
}
