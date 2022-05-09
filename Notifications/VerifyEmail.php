<?php

declare(strict_types=1);

namespace Modules\LU\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Lang;
use Illuminate\Support\Facades\URL;
use Modules\LU\Models\User;

/**
 * Class VerifyEmail.
 */
class VerifyEmail extends Notification {
    use Queueable;
    /**
     * The callback that should be used to create the verify email URL.
     *
     * @var \Closure|null
     */
    public static $createUrlCallback;

    /**
     * The callback that should be used to build the mail message.
     *
     * @var \Closure|null
     */
    public static $toMailCallback;

    /**
     * Create a new notification instance.
     */
    /*
    public function __construct()
    {
        //
    }
    */

    /**
     * Get the notification's delivery channels.
     *
     * @param User $notifiable
     *
     * @return array
     */
    public function via($notifiable) {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param User $notifiable
     *
     * @return \Illuminate\Notifications\Messages\MailMessage
     */

    /**
     * Build the mail representation of the notification.
     *
     * @param User $notifiable
     *
     * @return \Illuminate\Notifications\Messages\MailMessage|mixed
     */
    public function toMail($notifiable) {
        if (static::$toMailCallback) {
            return call_user_func(static::$toMailCallback, $notifiable);
        }

        return (new MailMessage())
            ->subject(strval(Lang::getFromJson('Verify Email Address')))
            ->markdown('lu::notifications.email', ['subcopy' => 'subcopy']) //, ['user' => $this->user]
            ->line(Lang::getFromJson('Please click the button below to verify your email address.'))
            ->action(
                strval(Lang::getFromJson('Verify Email Address')),
                $this->verificationUrl($notifiable)
            )
            ->line(Lang::getFromJson('If you did not create an account, no further action is required.'));
    }

    /**
     * Get the verification URL for the given notifiable.
     *
     * @param User $notifiable
     *
     * @return string|mixed
     */
    protected function verificationUrl($notifiable) {
        if (static::$createUrlCallback) {
            return call_user_func(static::$createUrlCallback, $notifiable);
        }
        $minutes = Config::get('auth.verification.expire', 60);
        if (! is_numeric($minutes)) {
            $minutes = 60;
        }

        return URL::temporarySignedRoute(
            'verification.verify',
            Carbon::now()->addMinutes((int) $minutes),
            [
                'id' => $notifiable->getKey(),
                'hash' => sha1($notifiable->getEmailForVerification()),
            ]
        );
    }

    /**
     * Set a callback that should be used when building the notification mail message.
     */
    public static function toMailUsing(\Closure $callback): void {
        static::$toMailCallback = $callback;
    }

    /**
     * Get the array representation of the notification.
     *
     * @param mixed $notifiable
     *
     * @return array
     */
    public function toArray($notifiable) {
        return [
        ];
    }
}