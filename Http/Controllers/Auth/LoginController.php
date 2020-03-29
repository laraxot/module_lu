<?php

namespace Modules\LU\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Auth;
use Carbon\Carbon;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Str;
//use App\Http\Requests;
use Modules\LU\Models\SocialProvider;
use Modules\LU\Models\User;
use Socialite;

class LoginController extends Controller {
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
     */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/';

    // /home
    //*
    public function redirectTo() {
        if (\Request::has('referer')) {
            return Request::input('referer');
        }
        if (url()->previous() != url()->current()) {
            return url()->previous();
        }

        return '/';
    }

    //*/

    /**
     * Create a new controller instance.
     */
    public function __construct() {
        $this->middleware('guest', ['except' => 'logout']);
    }

    public function username() {
        return 'handle';
    }

    //--------------------
    public function password() {
        return 'passwd';
    }

    public function showLoginForm(Request $request) {
        /* --- il segnmento 1
        $locale = \Request::segment(1);
        if (in_array($locale, ['it','en','de','fr'])) {
        \App::setLocale($locale);
        };
         */

        $params = \Route::current()->parameters();
        $locz = ['pub_theme', 'adm_theme', 'lu'];
        $tpl = 'auth.login';
        if ($request->ajax()) {
            $tpl .= '_ajax';
        } /*
        if ($request->ajax()) {
        foreach ($locz as $loc) {
        $view=$loc.'::auth.ajax_login';
        if (\View::exists($view)) {
        return view($view)
        ->with('params',$params)
        ->with('lang',\App::getLocale())
        ->with('view',$view)
        ;
        }
        }
        return '<h3>Non esiste la view ['.$view.']</h3>';
        }
         */
        foreach ($locz as $loc) {
            $view = $loc.'::'.$tpl;
            if (\View::exists($view)) {
                \View::composer('*', function ($view1) use ($view) {
                    \View::share('view', $view);
                });

                $html= view($view, ['action' => 'login'])
                    ->with('params', $params)
                    ->with('lang', \App::getLocale())
                    ->with('view', $view)
                    //->with('tmp',$locale)
                    //->with('row',$row)
                ;
                if ($request->ajax()) {
                    return response()->json(
                        [
                            'msg'=>'ok',
                            'html'=>(string)$html,
                        ]
                    );
                }
                return $html;
            }
        }

        return '<h3>Non esiste la view ['.$view.']</h3>['.__LINE__.']['.__FILE__.']';
    }

    public function login(Request $request) {
        if ($this->hasTooManyLoginAttempts($request)) {
            $this->fireLockoutEvent($request);

            return $this->sendLockoutResponse($request);
        }

        $data = $request->all();
        $username_field = $this->username();
        if (isset($data['ente']) && isset($data['matr'])) {
            $data['username'] = $data['ente'].'-'.$data['matr'];
        }

        if (isset($data['username'])) {
            $user = User::where($username_field, $data['username'])->first();
        }
        if (isset($data['email'])) {
            $user = User::where('email', $data['email'])->first();
        }
        if (isset($data['user_email'])) {
            $user = User::where('email', $data['user_email'])->first();
        }
        /*
        if(!$user->hasVerifiedEmail()){
        return redirect()->route('verification.notice');
        }
        //*/
        /*
        if (isset($user) && $user->superAdmin() && 1 == User::count()) {
        if (null == $user->perm) {
        $user->perm()->create(['perm_type' => 5]);
        Area::syncPacks();
        $areas = Area::all();
        foreach ($areas as $area) {
        $user->addArea($area);
        }
        }
        $user->perm->perm_type = 5;
        $user->perm->save();
        }
         */
        //}

        if (isset($user) && $user->passwd == \md5($data['password'])) {
            $this->clearLoginAttempts($request);
            //dd($user);
            Auth::login($user, $request->has('remember'));
            $auth = Auth::loginUsingId($user->auth_user_id, $request->has('remember'));
            //return redirect()->intended('/admin');
            $out = redirect()->intended($this->redirectPath());
            if ($request->ajax()) {
                //return response()->json(['status' => 1, 'msg' => 'attendere..']);
                return response()->json(['redirect' => '.', 'msg' => 'attendere']);
            }

            //return $out;
            return $this->sendLoginResponse($request);
        } else {
            $this->incrementLoginAttempts($request);
            if ($request->ajax()) {
                return response()->json(
                    [
                        'error' => 'user o pwd errati',
                        'errors' => ['password' => 'user o pwd errati'],
                    ],
                    500
                );
            }

            return redirect()->guest(route('login'))
                ->withError('Qualcosa di errato !')
                ->withInput($request->all())
                ->withErrors([
                    'email' => 'user o password sbagliati',
                    'password' => 'user o password sbagliati',
                ]);
        }
    }

    protected function authenticated($request, $user) {
        $user->update([
            'last_login_at' => Carbon::now()->toDateTimeString(),
            'last_login_ip' => $request->getClientIp(),
        ]);

        /*
    die('['.__LINE__.']['.__FILE__.']');
    if ($user->role === 'admin') {
    return redirect()->intended('/admin_path_here');
    }

    return redirect()->intended('/path_for_normal_user');
     */
    }

    /*
    funzione aggiuntiva per permettere l'invio della risposta json
    alla richiesta ajax di login, perchè di default laravel non
    ritorna dati alle chiamate ajax
     */
    protected function sendFailedLoginResponse(Request $request) {
        if ($request->ajax()) {
            return response()->json([
                'error' => 'auth.failed',
            ], 401);
        }

        return redirect()->back()
            ->withInput($request->only($this->username(), 'remember'))
            ->withErrors([
                $this->username() => 'auth.failed',
            ]);
    }

    //------------------

    /**
     * Redirect the user to the GitHub authentication page.
     *
     * @return \Illuminate\Http\Response
     */
    public function redirectToProvider($provider) {
        if ('facebook' != $provider) {
            return Socialite::driver($provider)->redirect();
        } else {
            return Socialite::driver($provider)
                ->scopes(
                    ['public_profile', 'pages_messaging', 'manage_pages', 'pages_messaging_subscriptions',
                        //'user_friends',
                        //'default', invalid scope
                        'email',
                        //'user_age_range','user_birthday','user_gender','user_location',/*user_events*/
                    ]
                )
                ->redirect();
        }
    }

    /**
     * Obtain the user information from GitHub.
     *
     * @return \Illuminate\Http\Response
     */
    public function handleProviderCallback($provider) {
        try {
            $socialUser = Socialite::driver($provider)->user();
        } catch (\Exception $e) {
            return redirect('/');
        }
        //ddd($socialUser);
        //getAvatar
        $socialProvider = SocialProvider::where('provider_id', $socialUser->getId())->where('provider', $provider)->first();
        if (! $socialProvider) {
            $handle=$socialUser->getNickname();
            if ($handle=='') {
                $handle=Str::slug($socialUser->getName());
            }
            $user = User::firstOrCreate(
                [
                    'email' => $socialUser->getEmail()
                ],
                [
                    'first_name' => $socialUser->getName(),
                    'handle' => $handle,
                    //'avatar_img' => $socialUser->getAvatar(),
                    //'social_login' => true //tell the database they are logging in from oauth
                ]
            );
            if ($user->handle=='' && $handle!='') {
                $user->handle=$handle;
                $user->save();
            }


            $user->socialProviders()->create(
                [
                    'provider_id' => $socialUser->getId(),
                    'provider' => $provider,
                    'token' => $socialUser->token
                ]
            );
        } else {
            $user = $socialProvider->user;
            $socialProvider->token = $socialUser->token;
            $socialProvider->save();
        }
        //dd($user);
        //die('['.__LINE__.']['.__FILE__.']');
        //$user=User::firstOrCreate(['email',$socialUser->getEmail()])
        Auth::login($user, 1);
        //auth()->login($user);
        return redirect()->intended($this->redirectPath());
        // $user->token;
    }

    public function authorization(Request $request) {
        $domain_url = (isset($_SERVER['HTTPS']) ? 'https' : 'http')."://$_SERVER[HTTP_HOST]";
        \header('Content-type: application/json');
        \header('Access-Control-Allow-Credentials: true');
        \header('Access-Control-Allow-Origin: '.\str_replace('.', '-', 'https://example.com').'.cdn.ampproject.org');

        \header('AMP-Access-Control-Allow-Source-Origin: '.$domain_url);
        \header('Access-Control-Expose-Headers: AMP-Access-Control-Allow-Source-Origin');
        //header("AMP-Redirect-To: https://example.com/thankyou.amp.html");
        \header('Access-Control-Expose-Headers: AMP-Redirect-To, AMP-Access-Control-Allow-Source-Origin');
        /*
        $domain_url = (isset($_SERVER['HTTPS']) ? "https" : "http") . "://$_SERVER[HTTP_HOST]";
        header("Content-type: application/json");
        header("Access-Control-Allow-Credentials: true");
        header("Access-Control-Allow-Origin: ". str_replace('.', '-',$domain_url) .".cdn.ampproject.org");
        header("Access-Control-Allow-Headers", "Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

        header("AMP-Access-Control-Allow-Source-Origin: " . $domain_url);
        header("Access-Control-Expose-Headers: AMP-Access-Control-Allow-Source-Origin");
        if($request->redirectUrl!=''){
        header("AMP-Redirect-To: ".$request->redirectUrl);
        header("Access-Control-Expose-Headers: AMP-Redirect-To, AMP-Access-Control-Allow-Source-Origin");
        }
        //header("Access-Control-Expose-Headers: AMP-Access-Control-Allow-Source-Origin");
        $ris=['loggedIn'=>Auth::check()];
        if(Auth::check()){
        $ris['user']=Auth::user()->handle;
        }
        //echo json_encode($ris);
        return response()->json($ris);
        //https://searchwilderness.com/amp-forms/#gref
         */
        $domain_url = (isset($_SERVER['HTTPS']) ? 'https' : 'http')."://$_SERVER[HTTP_HOST]";
        \header('Content-type: application/json');
        \header('Access-Control-Allow-Credentials: true');
        \header('Access-Control-Allow-Headers:Content-Type, Content-Length, Accept-Encoding, X-CSRF-Token');
        //https://ampbyexample.com/playground/#url=https%3A%2F%2Fampbyexample.com%2Fcomponents%2Famp-form%2Fsource%2F
        //header("Access-Control-Allow-Origin: ". str_replace('.', '-','https://example.com') .".cdn.ampproject.org");
        \header('Access-Control-Allow-Origin: '.$_SERVER['HTTP_ORIGIN']);
        \header('AMP-Access-Control-Allow-Source-Origin: '.$domain_url);
        \header('Access-Control-Expose-Headers: AMP-Access-Control-Allow-Source-Origin');
        \header('AMP-Redirect-To: https://example.com/thankyou.amp.html');
        \header('Access-Control-Expose-Headers: AMP-Redirect-To, AMP-Access-Control-Allow-Source-Origin');
        $ris = ['loggedIn' => true];
        $ris['user'] = 'Marco';
        echo \json_encode($ris);
        exit;
    }
}
