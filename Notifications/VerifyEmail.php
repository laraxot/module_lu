<?php

declare(strict_types=1);

namespace Modules\LU\Notifications;

use Illuminate\Auth\Notifications\VerifyEmail as BaseVerifyEmail;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Support\Facades\Lang;

/**
 * Class VerifyEmail.
 */
class VerifyEmail extends BaseVerifyEmail
{
    /**
     * Build the mail representation of the notification.
     *
     * @param mixed $notifiable
     *
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        $verificationUrl = $this->verificationUrl($notifiable);

        if (static::$toMailCallback) {
            return call_user_func(static::$toMailCallback, $notifiable, $verificationUrl);
        }

        return $this->buildMailMessage($verificationUrl);
    }

    /**
     * Get the verify email notification mail message for the given URL.
     *
     * @param string $url
     *
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    protected function buildMailMessage($url)
    {
        $subject = view('pub_theme::auth.emails.verify-email.subject')->render();
        dddx($subject);
        $subject = strip_tags($subject);
        $view_html = 'pub_theme::auth.emails.verify-email.html';
        $view_plain = 'pub_theme::auth.emails.verify-email.plain';
        $view_params = [
            'url' => $url,
        ];
        return (new MailMessage())
            ->from('barrett@example.com', 'Barrett Blair')
            ->subject($subject)
            ->view($view_html, $view_params);
        /*
        return (new MailMessage())
            ->subject(Lang::get('Verify Email Address'))
            ->line(Lang::get('Please click the button below to verify your email address.'))
            ->action(Lang::get('Verify Email Address'), $url)
            ->line(Lang::get('If you did not create an account, no further action is required.'));
        */
    }
}
