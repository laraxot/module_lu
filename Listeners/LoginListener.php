<?php

declare(strict_types=1);

namespace Modules\LU\Listeners;

use Illuminate\Auth\Events\Login as LoginEvent;
use Modules\Xot\Datas\XotData;

class LoginListener
{
    public XotData $xot;
    public string $register_type;

    /**
     * Handle the given event.
     */
    public function handle(LoginEvent $event): void
    {
        // $this->xot = XotData::make();
        // $this->register_type = (string) $this->xot->register_type;
        // ...
        dddx($event);
    }
}
