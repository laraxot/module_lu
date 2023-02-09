<?php

declare(strict_types=1);

namespace Modules\LU\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
// --- MODELS ----
// --- SERVICES ---
use Modules\UI\Services\ThemeService;

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
            if (null !== $referrer) {
                throw new \Exception('['.__LINE__.']['.class_basename(__CLASS__).']');
            }

            return redirect($referrer);
            // return redirect('/');
        }

        $view = $this->panel->getView();
        $view_params = [
            // 'row' => $row,
        ];

        return view($view, $view_params);
        // return ThemeService::v1iew();
    }

    // end invoke
}// end noticeController
