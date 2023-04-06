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
    public array $vars = [];

    /**
     * Bind data to the view.
     *
     * @return void
     */
    public function compose(View $view) {
        // $user = Auth::user();

        $view->with('profile', $this->getProfile());
    }

    public function getProfile() {
        if (isset($this->vars['profile'])) {
            return $this->vars['profile'];
        }
        $profile = ProfileService::make(); // ->get($user);
        $profile_model = $profile->getProfile();
        if (null != $profile_model && method_exists($profile_model, 'init')) {
            $profile_model->init();
        }
        $this->vars['profile'] = $profile;

        return $this->vars['profile'];
    }
}
