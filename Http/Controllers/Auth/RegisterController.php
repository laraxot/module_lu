<?php

declare(strict_types=1);

namespace Modules\LU\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Auth\Events\Registered;
use Illuminate\Contracts\Support\Renderable;
// --------- Models ------------
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Modules\LU\Http\Controllers\BaseController;
use Modules\LU\Models\User;
use Modules\Xot\Datas\XotData;
use Modules\Xot\Services\FileService;

/**
 * Class RegisterController.
 */
class RegisterController extends BaseController
{
    use RegistersUsers;

    public XotData $xot;
    public string $register_type;

    /**
     * Where to redirect users after registration.
     */
    protected string $redirectTo = '/';

    /**
     * Create a new controller instance.
     */
    public function __construct()
    {
        $this->middleware('guest');
        $this->xot = XotData::from(config('xra'));
        $this->register_type = (string) $this->xot->register_type;
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        if (! isset($data['handle']) && isset($data['username'])) {
            $data['handle'] = $data['username'];
        }
        $rules = [];

        switch ($this->register_type) {
            case '0':
                $rules = [
                    'handle' => 'required|max:255',
                    'email' => 'required|email|max:255|unique:liveuser_general.users', // |unique:users
                    // 'email' => 'required|email|max:255', // 4 debug !!!
                    'password' => 'required|min:6|confirmed',
                ];
                break;
            case '3':
                $rules = [
                    'email' => 'required|email|unique:liveuser_general.users', // |unique:users',
                ];
                break;
            default:
                throw new \Exception('[register_type:'.$this->register_type.']['.__LINE__.']['.__FILE__.']');
        }

        return Validator::make($data, $rules);
    }

    // ---------------------------------------------------------------------------------------
    public function showRegistrationForm(Request $request): Renderable
    {
        $referrer = str_replace(url('/'), '', url()->previous());
        $params = getRouteParameters();
        $register_type = $this->xot->register_type;
        $piece = 'auth.register.'.$register_type;
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

        return view($view, $view_params);
    }

    /**
     * Handle a registration request for the application.
     *
     * @return mixed
     */
    public function register(Request $request)
    {
        $data = $request->all();
        $validated = $this->validator($data)->validate();

        $user = User::query()->create($validated);
        event(new Registered($user));

        $this->guard()->login($user);

        $profile = $user->profileOrCreate()->first();

        if (method_exists($profile, 'registered')) {
            $out = $profile->registered();

            if (null != $out) {
                return $out;
            }
        }

        // if ($response = $this->registered($request, $user)) {
        //    return $response;
        // }

        return $request->wantsJson()
            ? new JsonResponse([], 201)
            : redirect($this->redirectPath());
    }

    /*
     * Get the guard to be used during registration.
     *
     * @return \Illuminate\Contracts\Auth\StatefulGuard

    //protected function guard() {
    //    return Auth::guard();
    //}

    /**
     * The user has been registered.
     *
     * @param mixed $user
     *
     * @return mixed
     */
    protected function registered(Request $request, $user)
    {
    }
}// end class
