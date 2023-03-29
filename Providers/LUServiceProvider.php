<?php

declare(strict_types=1);

namespace Modules\LU\Providers;

// ---- bases ----

use Illuminate\Auth\Events\Registered;
use Illuminate\Foundation\AliasLoader;
// use Modules\LU\Models\User;
use Illuminate\Support\Facades\Event;
use Illuminate\Support\Facades\View;
use Laravel\Passport\Passport;
use Modules\LU\Listeners\RegisteredListener;
use Modules\LU\Models\OauthAccessToken;
use Modules\LU\Models\OauthAuthCode;
use Modules\LU\Models\OauthClient;
use Modules\LU\Models\OauthPersonalAccessClient;
use Modules\LU\Models\OauthRefreshToken;
use Modules\LU\View\Composers\LUComposer;
use Modules\Xot\Providers\XotBaseServiceProvider;
use Modules\Xot\Services\BladeService;

/**
 * Class LUServiceProvider.
 */
class LUServiceProvider extends XotBaseServiceProvider {
    protected string $module_dir = __DIR__;

    protected string $module_ns = __NAMESPACE__;

    public string $module_name = 'lu';

    public function bootCallback(): void {
        $this->commands(
            [
                \Modules\LU\Console\CreateUserCommand::class,
                \Modules\LU\Console\CreateAreasCommand::class,
            ]
        );

        // $this->registerLivewireComponents();

        $this->registerPassport();

        $this->registerViewComposers();
        // BladeService::registerComponents($this->module_dir.'/../View/Components', 'Modules\\LU');
        $this->mergeConfigs();
        $this->registerEvents();
    }

    public function registerEvents() {
        Event::listen(
            Registered::class,
            [RegisteredListener::class, 'handle']
        );
    }

    public function registerPassport(): void {
        Passport::usePersonalAccessClientModel(OauthPersonalAccessClient::class);
        Passport::useTokenModel(OauthAccessToken::class);
        Passport::useRefreshTokenModel(OauthRefreshToken::class);
        Passport::useAuthCodeModel(OauthAuthCode::class);
        Passport::useClientModel(OauthClient::class);
        if (method_exists(Passport::class, 'routes')) {
            Passport::routes();
        }
    }

    public function registerCallback(): void {
        $loader = AliasLoader::getInstance();
        $loader->alias('Profile', 'Modules\LU\Services\ProfileService');
    }

    private function registerViewComposers(): void {
        View::composer('*', LUComposer::class);
    }

    public function mergeConfigs(): void {
        if ($this->app->runningUnitTests()) {
            // $this->publishes([
            //    __DIR__ . '/../Config/xra.php' => config_path('xra.php'),
            // ], 'config');
            $this->mergeConfigFrom(__DIR__.'/../Config/auth.php', 'auth');

            return;
        }
    }
}

/*
* https://github.com/Idavoll/User/tree/2.0
* https://laravel-news.com/laravel-model-events-getting-started
* fireModelEvent
* https://www.marknotes.fr/docs/Development/Web/Laravel/Slides/Event_Driven/index.html
* https://blog.pusher.com/event-driven-laravel-applications/
*/
