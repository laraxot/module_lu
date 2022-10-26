<?php

declare(strict_types=1);

namespace Modules\LU\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
// use App\Http\Requests;
use Illuminate\Support\Str;
use Modules\LU\Models\User;
use Modules\Xot\Contracts\UserContract;
use Modules\Xot\Services\FileService;

/**
 * Class LoginController.
 */
class LoginController extends Controller
{
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
     */
    protected string $redirectTo = '/';

    // /home
    // *

    /**
     * @return mixed|string
     */
    public function redirectTo()
    {
        if (\Request::has('referrer')) {
            return request()->input('referrer');
        }

        if (url()->previous() !== url()->current()) {
            return url()->previous();
        }

        return '/';
    }

    // */

    /**
     * Create a new controller instance.
     */
    public function __construct()
    {
        $this->middleware('guest', ['except' => 'logout']);
    }

    /**
     * @return string
     */
    public function username()
    {
        return 'handle';
    }

    // --------------------

    /**
     * @return string
     */
    public function password()
    {
        return 'passwd';
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\JsonResponse|string
     */
    public function showLoginForm(Request $request)
    {
        $referrer = str_replace(url('/'), '', url()->previous());
        $params = getRouteParameters();

        $piece = 'auth.login';
        FileService::viewCopy('lu::'.$piece, 'pub_theme::'.$piece);

        /**
         * @phpstan-var view-string
         */
        $view = 'pub_theme::'.$piece;

        $view_params = [
            'action' => 'login',
            'params' => $params,
            'lang' => app()->getLocale(),
            'view' => $view,
            'referrer' => $referrer,
        ];

        return view()->make($view)->with($view_params);
    }

    /**
     * Handle a login request to the application.
     *
     * @return mixed|void
     */
    public function login(Request $request)
    {
        if ($this->hasTooManyLoginAttempts($request)) {
            $this->fireLockoutEvent($request);
            // 149    Result of method Modules\LU\Http\Controllers\Auth\LoginController::sendLockoutResponse() (void) is used.
            // return $this->sendLockoutResponse($request);
            $this->sendLockoutResponse($request);

            return;
        }

        $data = $request->all();
        $username_field = $this->username();

        if (isset($data['ente']) && isset($data['matr'])) {
            $data['username'] = $data['ente'].'-'.$data['matr'];
        }
        $user = null;

        if (isset($data['username'])) {
            $user = User::query()->where($username_field, $data['username'])->first();
        }
        if (isset($data['email'])) {
            $user = User::query()->where('email', $data['email'])->first();
        }
        if (isset($data['user_email'])) {
            $user = User::query()->where('email', $data['user_email'])->first();
        }

        if (isset($user) && isset($data['password']) && $user->passwd === md5($data['password'])) {
            $this->clearLoginAttempts($request);
            // dd($user);
            Auth::login($user, $request->has('remember'));
            $auth = Auth::loginUsingId($user->getKey(), $request->has('remember'));
            $out = redirect()->intended($this->redirectPath());
            if ($request->ajax()) {
                return response()->json(['redirect' => '.', 'msg' => 'attendere']);
            }

            // return $out;
        // 179    Unreachable statement - code above always terminates.
            return $this->sendLoginResponse($request); // use authenticated
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
                ->withErrors(
                    [
                        'email' => 'user o password sbagliati',
                        'password' => 'user o password sbagliati',
                    ]
                );
        }
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param UserContract             $user
     */
    protected function authenticated($request, $user): void
    {
        $user->update(
            [
                'last_login_at' => Carbon::now()->toDateTimeString(),
                'last_login_ip' => $request->getClientIp(),
            ]
        );

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

    /**
     * @return \Illuminate\Http\JsonResponse|\Illuminate\Http\RedirectResponse
     */
    protected function sendFailedLoginResponse(Request $request)
    {
        if ($request->ajax()) {
            return response()->json(
                [
                    'error' => 'auth.failed',
                ],
                401
            );
        }

        return redirect()->back()
            ->withInput($request->only($this->username(), 'remember'))
            ->withErrors(
                [
                    $this->username() => 'auth.failed',
                ]
            );
    }

    // ------------------

    public function authorization(Request $request): void
    {
        $domain_url = (isset($_SERVER['HTTPS']) ? 'https' : 'http')."://$_SERVER[HTTP_HOST]";
        header('Content-type: application/json');
        header('Access-Control-Allow-Credentials: true');
        header('Access-Control-Allow-Origin: '.str_replace('.', '-', 'https://example.com').'.cdn.ampproject.org');

        header('AMP-Access-Control-Allow-Source-Origin: '.$domain_url);
        header('Access-Control-Expose-Headers: AMP-Access-Control-Allow-Source-Origin');
        // header("AMP-Redirect-To: https://example.com/thankyou.amp.html");
        header('Access-Control-Expose-Headers: AMP-Redirect-To, AMP-Access-Control-Allow-Source-Origin');
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
        header('Content-type: application/json');
        header('Access-Control-Allow-Credentials: true');
        header('Access-Control-Allow-Headers:Content-Type, Content-Length, Accept-Encoding, X-CSRF-Token');
        // https://ampbyexample.com/playground/#url=https%3A%2F%2Fampbyexample.com%2Fcomponents%2Famp-form%2Fsource%2F
        // header("Access-Control-Allow-Origin: ". str_replace('.', '-','https://example.com') .".cdn.ampproject.org");
        header('Access-Control-Allow-Origin: '.$_SERVER['HTTP_ORIGIN']);
        header('AMP-Access-Control-Allow-Source-Origin: '.$domain_url);
        header('Access-Control-Expose-Headers: AMP-Access-Control-Allow-Source-Origin');
        header('AMP-Redirect-To: https://example.com/thankyou.amp.html');
        header('Access-Control-Expose-Headers: AMP-Redirect-To, AMP-Access-Control-Allow-Source-Origin');
        $ris = ['loggedIn' => true];
        $ris['user'] = 'Marco';
        echo json_encode($ris);
        exit;
    }
}
