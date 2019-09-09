<?php

namespace Modules\LU\Providers;

// per dizionario morph

//---- bases ----
use Modules\Xot\Providers\XotBaseServiceProvider;

class LUServiceProvider extends XotBaseServiceProvider {
    protected $module_dir = __DIR__;
    protected $module_ns = __NAMESPACE__;
    public $module_name = 'lu';

    public function bootCallback() {
        //ddd('preso');
        /*
    	if(!\Auth::check()) {
        	//$userClass = config('auth.providers.users.model');
        	$userClass= \Modules\LU\Models\User::class;
        	\Auth::setUser(new $userClass());
        	ddd(\Auth::user());
    	}
    	*/
        $this->commands([
            \Modules\LU\Console\CreateUserCommand::class,
            \Modules\LU\Console\CreateAreasCommand::class,
            \Modules\LU\Console\CreateProfileCommand::class,
        ]);
    }
}

/*
* https://github.com/Idavoll/User/tree/2.0
* https://laravel-news.com/laravel-model-events-getting-started
* fireModelEvent
* https://www.marknotes.fr/docs/Development/Web/Laravel/Slides/Event_Driven/index.html
* https://blog.pusher.com/event-driven-laravel-applications/
*/
