<?php

declare(strict_types=1);

namespace Modules\LU\Providers;

//---- bases ----
use Illuminate\Foundation\AliasLoader;
//use Modules\LU\Models\User;
use Modules\Xot\Providers\XotBaseServiceProvider;

/**
 * Class LUServiceProvider.
 */
class LUServiceProvider extends XotBaseServiceProvider {
    protected string $module_dir = __DIR__;

    protected string $module_ns = __NAMESPACE__;

    public string $module_name = 'lu';

    public function bootCallback(): void {
        $this->commands([
            \Modules\LU\Console\CreateUserCommand::class,
            \Modules\LU\Console\CreateAreasCommand::class,
        ]);

        //$this->registerLivewireComponents();
    }

    public function registerCallback(): void {
        $loader = AliasLoader::getInstance();
        $loader->alias('Profile', 'Modules\LU\Services\ProfileService');
    }
}

/*
* https://github.com/Idavoll/User/tree/2.0
* https://laravel-news.com/laravel-model-events-getting-started
* fireModelEvent
* https://www.marknotes.fr/docs/Development/Web/Laravel/Slides/Event_Driven/index.html
* https://blog.pusher.com/event-driven-laravel-applications/
*/