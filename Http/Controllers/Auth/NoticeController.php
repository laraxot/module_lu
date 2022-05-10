<?php

declare(strict_types=1);

namespace Modules\LU\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
// --- MODELS ----
// --- SERVICES ---
use Modules\Theme\Services\ThemeService;

/**
 * Class NoticeController.
 */
class NoticeController extends Controller {
    /**
     * Specie di middleware ?
     *
     * @return mixed
     * @return mixed
     */
    public function __invoke() {
        if (\Auth::check()) {
            $referrer = request()->input('referrer', '/');

            return redirect($referrer);
            // return redirect('/');
        }

        return ThemeService::view();
    }

    // end invoke
}// end noticeController
