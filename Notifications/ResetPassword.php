<?php

/**
 * https://tech.fleka.me/translate-laravels-reset-password-email-b0f1d6e4709a.
 */
declare(strict_types=1);

namespace Modules\LU\Notifications;

use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
// use Illuminate\Auth\Notifications\ResetPassword as ResetPasswordNotification;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Lang;
use Illuminate\Support\Facades\URL;

/**
 * Class ResetPassword.
 */
class ResetPassword extends Notification {
    /**
     * The password reset token.
     */
    public string $token;

    /**
     * Create a notification instance.
     */
    public function __construct(string $token) {
        $this->token = $token;
    }

    /**
     * Get the notification's channels.
     *
     * @param mixed $notifiable
     *
     * @return array|string
     */
    public function via($notifiable) {
        return ['mail'];
    }

    /**
     * Build the mail representation of the notification.
     *
     * @param mixed $notifiable
     *
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable) {
        // /*

        $views = [
            'pub_theme::notifications.email',
            // 'lu::notifications.email', //commento perche' mi accontento di quello standard
        ];

        $markdown = Arr::first(
            $views,
            function ($view) {
                return view()->exists($view);
            }
        );

        $url = url(route('password.reset', $this->token, false));

        $mail = (new MailMessage())
            // ->from('admin@app.com', 'AppName')
            ->subject(trans('lu::notifications.reset_password.subject'));
        if (null !== $markdown && \is_string($markdown)) {
            $mail = $mail->markdown($markdown, ['subcopy' => 'subcopy']);
        }
        $mail = $mail->line(trans('lu::notifications.reset_password.line1'))
            ->action(trans('lu::notifications.reset_password.action'), $url)
            ->line(trans('lu::notifications.reset_password.line2'));

        return $mail;
        // ->greeting(trans('lu::notifications.reset_password.greeting', ['username' => $this->username]))
        // ->markdown($markdown, ['subcopy' => 'subcopy'])

        /*
        return (new MailMessage())
             ->subject(strval(Lang::getFromJson('Re-imposta Password')))
             ->markdown($markdown, ['subcopy' => 'subcopy'])
             ->line(Lang::getFromJson('Hai ricevuto questa email perchè abbiamo ricevuto una richiesta di re-impostazione della password per il tuo account.'))
             ->action('Re-imposta Password', url(route('password.reset', $this->token, false)))
             ->line(Lang::getFromJson('Se non hai effettuato tu questa richiesta, non fare niente.'));
        */
        /*
        return (new MailMessage)
            ->subject('Your Reset Password Subject Here')
            ->line('You are receiving this email because we received a password reset request for your account.')
            ->action('Reset Password', url('password/reset', $this->token))
            ->line('If you did not request a password reset, no further action is required.');


            ->action('Reset Password', url('password/reset', $this->token).'?email='.urlencode($this->email))

        */

        /* return (new MailMessage())
             ->subject(strval(Lang::getFromJson('Reset Password')))
             ->markdown('lu::notifications.email', ['subcopy' => 'subcopy'])
             ->line(Lang::getFromJson('You are receiving this email because we received a password reset request for your account.'))
             ->action('Reset Password', url(route('password.reset', $this->token, false)))
             ->line(Lang::getFromJson('If you did not request a password reset, no further action is required.'));*/

        // */
        /*
        $reset_password_url=url(route('password.reset', $this->token, false));
        return (new MailMessage())
        ->subject(Lang::getFromJson('Verify Email Address'))
        ->greeting('Hello!')
        ->view('lu::mail.reset_password',['reset_password_url'=>$reset_password_url])
        */
    }
}