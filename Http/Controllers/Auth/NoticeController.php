<?php

namespace Modules\LU\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
//--- MODELS ----
//--- SERVICES ---
use Modules\Theme\Services\ThemeService;

class NoticeController extends Controller {
    /**
     * Specie di middleware ?
     *
     **/
    public function __invoke() {
        if (\Auth::check()) {
            return redirect('/');
        }

        return ThemeService::view();
    }

    //end invoke
}//end noticeController
