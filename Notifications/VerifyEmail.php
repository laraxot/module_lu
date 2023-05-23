<?php

declare(strict_types=1);

namespace Modules\LU\Notifications;

use Illuminate\Auth\Notifications\VerifyEmail as BaseVerifyEmail;
use Illuminate\Support\Facades\Lang;
use Illuminate\Support\Str;
use Modules\LU\Actions\BuildUserMailMessageAction;
use Modules\LU\Models\User;
use Modules\Payment\View\Components\NexiPayment;
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
<<<<<<< HEAD
    public function __construct()
    {
        $this->xot = XotData::make();
=======
    public function __construct() {
<<<<<<< HEAD
        $this->xot = XotData::from(config('xra'));
>>>>>>> 5b24bc0 (.)
=======
        $this->xot = XotData::make();
>>>>>>> 63cfc71 (.)
        $this->register_type = (string) $this->xot->register_type;
    }

    /**
     * Build the mail representation of the notification.
     *
     * @param object $notifiable
     *
     * @return \Illuminate\Notifications\Messages\MailMessage|mixed
     */
    public function toMail($notifiable) {
        if ($notifiable instanceof User) {
            if (3 == $this->register_type && null == $notifiable->password) {
                // dddx(['notifiable' => $notifiable, fake()->password()]);
                $password = fake()->password();
                $handle = Str::before(strval($notifiable->email), '@'); // ?? fake()->name();
                $res = tap($notifiable)->update([
                    'handle' => $handle,
                    'passwd' => $password,
                ]);
                $this->view_params['password'] = $password;
            }
        }

        $this->locale = app()->getLocale();
        if (! method_exists($notifiable, 'toArray')) {
            throw new \Exception('['.__LINE__.']['.__FILE__.']');
        }
        $this->view_params = array_merge($this->view_params, $notifiable->toArray());
        $this->view_params['lang'] = $this->locale;

        $verificationUrl = $this->verificationUrl($notifiable);

        if (static::$toMailCallback) {
            return call_user_func(static::$toMailCallback, $notifiable, $verificationUrl);
        }

        $this->view_params['url'] = (string) $verificationUrl;
        $this->view_params['post_id'] = (string) $this->register_type;

        return app(BuildUserMailMessageAction::class)->execute('verify-email', $this->view_params);
    }

    /*
    public function toMail($notifiable) {
        $verificationUrl = $this->verificationUrl($notifiable);
        $this->view_params['url'] = (string) $verificationUrl;
        $this->view_params['payment_form'] = '';

        if ($notifiable instanceof User) {
            if (3 == $this->register_type && null == $notifiable->password) {
                $plan = request()->input('plan');

                if ('full' === $plan || 'light' === $plan) {
                    $contract_prefix = '';
                    if ('full' == $plan) {
                        $amount = '24.00';
                        $contract_prefix = 'NC_FULL_';
                    } elseif ('light' == $plan) {
                        $amount = '6.00';
                        $contract_prefix = 'NC_LIGHT_';
                    }

                    $profile = $notifiable->profileOrCreate()->first();

                    $payment = new NexiPayment($amount, 'simple', $contract_prefix, 'EUR', 'button button-primary', 'Paga', $profile, "box-sizing: border-box; font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Helvetica, Arial, sans-serif, 'Apple Color Emoji', 'Segoe UI Emoji', 'Segoe UI Symbol'; position: relative; -webkit-text-size-adjust: none; border-radius: 4px; color: #fff; display: inline-block; overflow: hidden; text-decoration: none; background-color: #2d3748; border-bottom: 8px solid #2d3748; border-left: 18px solid #2d3748; border-right: 18px solid #2d3748; border-top: 8px solid #2d3748;");

                    // to view->html
                    $paymentForm = $payment->render()->toHtml();

                    $res = tap($notifiable)->update([
                        'plan' => $plan,
                        'payment_form' => $paymentForm,
                    ]);

                    $this->view_params['plan'] = $plan;
                    $this->view_params['payment_form'] = $paymentForm;
                }

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

        if (static::$toMailCallback) {
            return \call_user_func(static::$toMailCallback, $notifiable, $verificationUrl);
        }

        $this->view_params['post_id'] = (string) $this->register_type;

        return app(BuildUserMailMessageAction::class)->execute('verify-email', $this->view_params);


    }
    */
}
