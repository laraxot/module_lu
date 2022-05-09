<?php

namespace Modules\LU\Bus;

use App\Bus\ICommand;
use App\Bus\IHandler;
use Modules\LU\Repositories\UserRepository;

class RegisterUserHandler implements IHandler {
    private $users = null;

    public function __construct(UserRepository $users) {
        $this->users = $users;
    }

    public function handle(ICommand $command) {
        dd(command);
    }
}
