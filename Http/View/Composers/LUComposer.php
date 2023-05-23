<?php

declare(strict_types=1);

namespace Modules\LU\Http\View\Composers;

// use App\Repositories\UserRepository;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\View\View;
use Modules\LU\Services\ProfileService;

/**
 * Class LUComposer.
 */
class LUComposer {
    /**
     * Bind data to the view.
     *
     * @return void
     */
    public function compose(View $view) {
        /** @var \Modules\LU\Models\User */
        $user = Auth::user();
        if (null == $user) {
            return;
        }
        $profile = ProfileService::make()->get($user);
        $lang = app()->getLocale();
        $params = [];
        $route_current = Route::current();
        if (null !== $route_current) {
            $params = $route_current->parameters();
        }

        $view->with('params', $params);
        $view->with('lang', $lang);
        $view->with('profile', $profile);
    }
}
