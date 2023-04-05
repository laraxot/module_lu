<?php

declare(strict_types=1);

namespace Modules\LU\Actions;

use Illuminate\Support\Str;
use Modules\LU\Models\User;
use Modules\Notify\Models\NotifyTheme;
use Spatie\QueueableAction\QueueableAction;
use Illuminate\Notifications\Messages\MailMessage;

class BuildUserMailMessageAction
{
    use QueueableAction;

<<<<<<< HEAD
    public function execute(string $name, array $view_params): MailMessage
=======
    public function execute(string $name, array $view_params)
>>>>>>> cf94a76 (up)
    {

        $theme = NotifyTheme::firstOrCreate([
            'lang' => $view_params['lang'],
            'type' => 'email', //email,sms,whatsapp,piccione
            'post_type' => $name,
<<<<<<< HEAD
            'post_id' => $view_params['post_id'] ?? 0,
=======
            'post_id' => $view_params['post_id'],
>>>>>>> cf94a76 (up)
        ]);
        if ($theme->subject == null) {
            $subject = trans('lu::auth.' . $name . '.subject');
            $theme->update(['subject' => $subject]);
        }
        if ($theme->theme == null) {
            $theme->update(['theme' => 'ark']);
        }
        if ($theme->body_html == null) {
            $html = trans('lu::auth.' . $name . '.body_html');

            if ($name == 'verify-email' && $view_params['post_id'] == 3) {
                $html .= '<br/>When you\'ll re-login this will be your password: ##password##';
            }

            $theme->update(['body_html' => $html]);
        }
        $view_params = array_merge($view_params, $theme->toArray());
        //$this->view_params['url'] = (string)$url;

        $body_html = $theme->body_html;
        foreach ($view_params as $k => $v) {
            if (is_string($v)) {
                $body_html = Str::replace('##' . $k . '##', $v, $body_html);
            }
        }

        $view_params['body_html'] = $body_html;

        $view_html = 'lu::auth.emails.html';

        //$out = view($view_html, $this->view_params);
        //dddx($this->view_params);
        //die($out->render());

        return (new MailMessage())
            //->from('barrett@example.com', 'Barrett Blair')
            ->subject($theme->subject)
            ->view($view_html, $view_params);
    }
}
