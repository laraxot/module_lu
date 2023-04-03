<?php

declare(strict_types=1);

namespace Modules\LU\View\Composers;

// use App\Repositories\UserRepository;
use Illuminate\Support\Facades\Auth;
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
        // $user = Auth::user();

        $profile = ProfileService::make(); // ->get($user);
        $profile_model = $profile->getProfile();
        if (method_exists($profile_model, 'init')) {
            $profile_model->init();
        }

        $view->with('profile', $profile);
    }
}
