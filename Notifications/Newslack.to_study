<?php

declare(strict_types=1);

namespace Modules\LU\Notifications;

use Carbon\Carbon;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Messages\SlackMessage;
use Illuminate\Notifications\Notification;

/**
 * Class Newslack.
 */
class Newslack extends Notification {
    use Queueable;

    public function __construct() {
    }

    /**
     * @param mixed $notifiable
     *
     * @return string[]
     */
    public function via($notifiable) {
        return ['slack'];
    }

    /**
     * @param mixed $notifiable
     *
     * @return SlackMessage
     */
    public function toSlack($notifiable) {
        return (new SlackMessage())
           ->content('A new visitor has visited to your application . at '.Carbon::now());
    }
}
