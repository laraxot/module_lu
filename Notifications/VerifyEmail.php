<?php

declare(strict_types=1);

namespace Modules\LU\Notifications;

use Illuminate\Auth\Notifications\VerifyEmail as BaseVerifyEmail;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Support\Facades\Lang;
use Illuminate\Support\Str;
use Modules\LU\Actions\BuildUserMailMessageAction;
use Modules\LU\Models\User;
use Modules\Notify\Models\NotifyTheme;
use Modules\Xot\Datas\XotData;

/**
 * Class VerifyEmail.
 */
class VerifyEmail extends BaseVerifyEmail {
    public XotData $xot;
    public string $register_type;
    public array $view_params = [];

    /**
     * Create a notification instance.
     */
    public function __construct() {
        $this->xot = XotData::from(config('xra'));
        $this->register_type = (string) $this->xot->register_type;
    }

    /**
     * Build the mail representation of the notification.
     *
     * @param mixed $notifiable
     *
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable) {
        if ($notifiable instanceof User) {
            if (3 == $this->register_type && null == $notifiable->password) {
                // dddx(['notifiable' => $notifiable, fake()->password()]);
                $password = fake()->password();
                $res = tap($notifiable)->update([
                    'handle' => Str::before($notifiable->email, '@'),
                    'passwd' => $password,
                ]);
                $this->view_params['password'] = $password;
            }
        }

        $this->locale = app()->getLocale();
        $this->view_params = array_merge($this->view_params, $notifiable->toArray());
        $this->view_params['lang'] = $this->locale;

        $verificationUrl = $this->verificationUrl($notifiable);

        if (static::$toMailCallback) {
            return call_user_func(static::$toMailCallback, $notifiable, $verificationUrl);
        }

        $this->view_params['url'] = (string) $verificationUrl;
        $this->view_params['post_id'] = (string) $this->register_type;

        return app(BuildUserMailMessageAction::class)->execute('verify-email', $this->view_params);

        // return $this->buildMailMessage($verificationUrl);
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
        $this->view_params['url'] = (string)$url;
        $this->view_params['post_id'] = (string)$this->register_type;


        $theme = NotifyTheme::firstOrCreate([
            'lang' => $this->locale,
            'type' => 'email', // email,sms,whatsapp,piccione
            'post_type' => 'verify-email',
            'post_id' => $this->register_type,
        ]);
        if (null == $theme->subject) {
            // $subject = view('lu::auth.emails.verify-email.subject')->render();
            // $subject = strip_tags($subject);
            $subject = trans('pub_theme::auth.verify_email_address');
            $theme->update(['subject' => $subject]);
        }
        if (null == $theme->theme) {
            $theme->update(['theme' => 'ark']);
        }
        if (null == $theme->body_html) {
            $html = 'Please click the button below to verify your email address.<br/>
                  <a href="##url##">Verify Email Address</a>
                  If you did not create an account, no further action is required.

            ';
            if (3 == $this->register_type) {
                $html .= '<br/>When you\'ll re-login this will be your password: ##password##';
            }

            $theme->update(['body_html' => $html]);
        }
        $this->view_params = array_merge($this->view_params, $theme->toArray());
        $this->view_params['url'] = (string) $url;

        $body_html = $theme->body_html;
        foreach ($this->view_params as $k => $v) {
            if (is_string($v)) {
                $body_html = Str::replace('##'.$k.'##', $v, $body_html);
            }
        }

        $this->view_params['body_html'] = $body_html;

        $view_html = 'lu::auth.emails.html';

        // $out = view($view_html, $this->view_params);
        // dddx($this->view_params);
        // die($out->render());

        return (new MailMessage())
            // ->from('barrett@example.com', 'Barrett Blair')
            ->subject($theme->subject)
            ->view($view_html, $this->view_params);
        /*
        return (new MailMessage())
            ->subject(Lang::get('Verify Email Address'))
            ->line(Lang::get('Please click the button below to verify your email address.'))
            ->action(Lang::get('Verify Email Address'), $url)
            ->line(Lang::get('If you did not create an account, no further action is required.'));
        */
    }
}
