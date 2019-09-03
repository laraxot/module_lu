<?php namespace Modules\LU\Bus;

use App\Bus\Bus;
use App\Bus\IHandler;
use App\Bus\ICommand;

use Modules\LU\Bus\RegisterUser;
use Modules\LU\Repositories\UserRepository;

class RegisterUserHandler implements IHandler {

    private $users = null;

    function __construct(UserRepository $users) {
        $this->users = $users;
    }

    public function handle(ICommand $command) {
        dd(command);




    }
}

