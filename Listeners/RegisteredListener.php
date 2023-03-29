<?php

declare(strict_types=1);

namespace Modules\LU\Listeners;

use Illuminate\Auth\Events\Registered;
use Modules\Xot\Datas\XotData;

class RegisteredListener {
    public XotData $xot;
    public string $register_type;

    /**
     * Handle the given event.
     */
    public function handle(Registered $event): void {
        $this->xot = XotData::from(config('xra'));
        $this->register_type = (string) $this->xot->register_type;
        // ...
        dddx($event);
    }
}
