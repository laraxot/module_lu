<?php

/**
 * https://tech.fleka.me/translate-laravels-reset-password-email-b0f1d6e4709a.
 */

declare(strict_types=1);

namespace Modules\LU\Notifications;

use Illuminate\Auth\Notifications\ResetPassword as BaseResetPassword;
// use Illuminate\Auth\Notifications\ResetPassword as ResetPasswordNotification;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Lang;
use Illuminate\Support\Facades\URL;
use Modules\LU\Actions\BuildUserMailMessageAction;
use Modules\LU\Datas\ResetPasswordData;

/**
 * Class ResetPassword.
 */
class ResetPassword extends BaseResetPassword
{
    public array $view_params = [];

    /**
     * Undocumented function.
     *
     * @param Model $notifiable
     *
     * @return \Illuminate\Notifications\Messages\MailMessage|mixed
     */
    public function toMail($notifiable)
    {
        if (static::$toMailCallback) {
            // dddx(static::$toMailCallback);
            return call_user_func(static::$toMailCallback, $notifiable, $this->token);
        }
        $this->locale = app()->getLocale();
        $this->view_params = array_merge($this->view_params, $notifiable->toArray());
        $this->view_params['lang'] = $this->locale;
        // $url = url(route('password.reset', $this->token, false));
        $url = $this->resetUrl($notifiable);

        $this->view_params['url'] = $url;

        return app(BuildUserMailMessageAction::class)->execute('reset-password', $this->view_params);
    }

    /**
     * Build the mail representation of the notification.
     *
     * @param mixed $notifiable
     *
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMailOld($notifiable)
    {
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
        $subject = trans('lu::notifications.reset_password.subject');
        if (! is_string($subject)) {
            throw new \Exception('['.__LINE__.']['.__FILE__.']');
        }
        $mail = (new MailMessage())
            // ->from('admin@app.com', 'AppName')
            ->subject($subject);
        if (null !== $markdown && \is_string($markdown)) {
            $mail = $mail->markdown($markdown, ['subcopy' => 'subcopy']);
        }
        /*
        $line1=trans('lu::notifications.reset_password.line1');
        $action=trans('lu::notifications.reset_password.action');
        $line2=trans('lu::notifications.reset_password.line2');
        */
        $txt = ResetPasswordData::from(trans('lu::notifications.reset_password'));
        $mail = $mail->line($txt->line1)
            ->action($txt->action, $url)
            ->line($txt->line2);

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
             ->line(Lang::getFromJson('If you did not request a password reset, no further action is required.'));
        */

        /*
        $reset_password_url=url(route('password.reset', $this->token, false));
        return (new MailMessage())
        ->subject(Lang::getFromJson('Verify Email Address'))
        ->greeting('Hello!')
        ->view('lu::mail.reset_password',['reset_password_url'=>$reset_password_url])
        */
    }
}
