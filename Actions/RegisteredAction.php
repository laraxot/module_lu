<?php

declare(strict_types=1);

namespace Modules\LU\Actions;

use Modules\LU\Models\User;
use Spatie\QueueableAction\QueueableAction;

class RegisteredAction
{
    use QueueableAction;

    /**
     * Undocumented function.
     *
     * @return void
     */
    public function execute(User $user)
    {
    }
}
