<?php

namespace Modules\LU\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Auth;
use Carbon\Carbon;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
//--- MODELS ----
use Modules\LU\Models\Area;
use Modules\LU\Models\SocialProvider;
use Modules\LU\Models\User;
use Socialite;
//--- SERVICES ---
use Modules\Theme\Services\ThemeService;



class NoticeController extends Controller {

	/**
	* Specie di middleware ?
	*
	**/


	public function __invoke(){
		if(\Auth::check()){
			return redirect('/');
		}
		return ThemeService::view();
	}//end invoke

}//end noticeController
