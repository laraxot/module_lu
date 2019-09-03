<?php namespace Modules\LU\Bus;

use App\Bus\Bus;
use App\Bus\ICommand;

class RegisterUser implements ICommand {
    
    private $message = null;
    
    function __construct() {
    }   
    
    public static function fromArray(array $arr) {
        
    }
}

