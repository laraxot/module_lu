<?php

declare(strict_types=1);

namespace Modules\LU\Actions;

use Spatie\QueueableAction\QueueableAction;

class SendEmailVerificationNotificationAction {
    use QueueableAction;
}
