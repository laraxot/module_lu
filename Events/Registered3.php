<?php

declare(strict_types=1);

namespace Modules\LU\Events;

use Illuminate\Auth\Events\Registered;

class Registered3 extends Registered {
    /**
     * The authenticated user.
     *
     * @var \Illuminate\Contracts\Auth\Authenticatable
     */
    public $user;
    public string $password;

    public function __construct($user, $password) {
        $this->user = $user;
        $this->password = $password;
    }
}
