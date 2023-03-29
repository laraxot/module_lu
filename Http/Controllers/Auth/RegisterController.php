<?php

declare(strict_types=1);

namespace Modules\LU\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Auth\Events\Registered;
// --------- Models ------------
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Modules\LU\Events\Registered0;
use Modules\LU\Models\User;
use Modules\LU\Notifications\VerifyEmailRegister3;
use Modules\Xot\Datas\XotData;
use Modules\Xot\Services\FileService;

/**
 * Class RegisterController.
 */
class RegisterController extends Controller {
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
    public function __construct() {
        $this->middleware('guest');
        $this->xot = XotData::from(config('xra'));
        $this->register_type = (string) $this->xot->register_type;
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data) {
        if (! isset($data['handle'])) {
            if (! isset($data['username'])) {
                throw new \Exception('Many pre-made templates have a username.. if they don\'t even have this better to have this error');
            }
            $data['handle'] = $data['username'];
        }
        $rules = [
        ];

        switch ($this->register_type) {
            case '0':
                $rules = [
                    'handle' => 'required|max:255',
                    // 'email' => 'required|email|max:255|unique:liveuser_general.users', // |unique:users
                    'email' => 'required|email|max:255', // 4 debug !!!
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

    /**
     * Create a new user instance after a valid registration.
     *
     * @return User
     */
    protected function create(array $data) {
        if (! isset($data['handle'])) {
            if (! isset($data['username'])) {
                throw new \Exception('Many pre-made templates have a username.. if they don\'t even have this better to have this error');
            }
            $data['handle'] = $data['username']; // molti template precotti hanno username.. se non hanno neppure questo meglio avere errore
        }
        $user = User::query()->create(
            [
                // 'name' => $data['name'],
                'handle' => $data['handle'],
                'email' => $data['email'],
                // 'passwd' => md5($data['password']),
                'passwd' => $data['password'], // lo facciamo con il setattribute
                // 'password' => bcrypt($data['password']),
            ]
        );

        // http://stackoverflow.com/questions/33562285/how-can-i-use-md5-hashing-for-passwords-in-laravel
        // email the user
        /*
        Mail::send('emails.register', ['user' => $user], function($message) use ($user)
        {
           $message->to($user->email, $user->name)->subject('Edexus - Welcome');
        });

        // email the admin
        Mail::send('emails.register-admin', ['user' => $user], function($message) use ($user)
        {
           $message->to('admins@***.com', 'Edexus')->subject('Edexus - New user sign up');
        });
        */
        return $user;
    }

    // ---------------------------------------------------------------------------------------
    public function showRegistrationForm(Request $request) {
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
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\JsonResponse|string
     */
    public function showRegistrationFormOLD(Request $request) {
        $params = getRouteParameters();
        $row = new User();
        $locz = ['pub_theme', 'adm_theme', 'lu'];
        $tpl = 'auth.register';
        if ($request->ajax()) {
            $tpl = 'auth.ajax_register';
        }

        $register_type = $this->xot->register_type;

        $tpl = $tpl.'.'.$register_type;

        foreach ($locz as $loc) {
            $view = $loc.'::'.$tpl;

            if (\View::exists($view)) {
                \View::composer(
                    '*',
                    function ($view1) use ($view) {
                        \View::share('view', $view);
                    }
                );

                $view_params = [
                    'action' => 'register',
                    'params' => $params,
                    'lang' => app()->getLocale(),
                    'view' => $view,
                    'row' => $row,
                ];

                $out = view($view, $view_params);

                if ($request->ajax()) {
                    return response()->json(
                        [
                            'msg' => 'ok',
                            'html' => (string) $out->render(),
                        ]
                    );
                }

                return $out;
            }
        }

        throw new \Exception('<h3>Non esiste la view ['.$view.']</h3>['.__LINE__.']['.__FILE__.']');
    }

    public function registerType0(Request $request) {
        $data = $request->all();
        $rules = [
            'email' => 'required|email|unique:liveuser_general.users', // |unique:users',
            'password' => 'required|min:3|confirmed',
            'password_confirmation' => 'required|min:3',
        ];

        $validator = Validator::make($data, $rules);
        $errors = $validator->errors();
        $msg = '';
        foreach ($errors->all() as $message) {
            $msg .= '<br/>'.$message;
        }
        if ($validator->fails()) {
            if ($request->ajax()) {
                return response()->json(['error' => $msg], 500);
            }

            return back()
                ->withError('Qualcosa di errato !')
                ->withInput($request->all())
                ->withErrors($validator->messages());
        }
        $user = $this->create($request->all());
        event(new Registered0($user));
        $this->guard()->login($user);
        if ($request->ajax()) {
            return response()->json(['redirect' => $this->redirectPath(), 'msg' => 'registrato con successo']);
        }

        return redirect($this->redirectPath());
    }

    public function registerType1(Request $request) {
        dddx('wip');
    }

    public function registerType2(Request $request) {
        dddx('wip');
    }

    public function registerType3(Request $request) {
        $data = $request->all();
        $faker = \Faker\Factory::create();
        $data['handle'] = $data['email'];
        $data['username'] = $data['email'];
        $data['password'] = $faker->password();

        $rules = [
            'email' => 'required|email|unique:liveuser_general.users', // |unique:users',
        ];

        $validator = Validator::make($data, $rules);
        $errors = $validator->errors();
        $msg = '';
        foreach ($errors->all() as $message) {
            $msg .= '<br/>'.$message;
        }
        if ($validator->fails()) {
            if ($request->ajax()) {
                return response()->json(['error' => $msg], 500);
            }

            return back()
                ->withError('Qualcosa di errato !')
                ->withInput($request->all())
                ->withErrors($validator->messages());
        }
        $user = $this->create($data);
        // event(new Registered3($user, $data['password']));

        $user->notify(new VerifyEmailRegister3($data['password']));

        $this->guard()->login($user);
        if ($request->ajax()) {
            return response()->json(['redirect' => $this->redirectPath(), 'msg' => 'registrato con successo']);
        }

        return redirect($this->redirectPath());
    }
    // --------------------------------------------------------------------------------

    /**
     * Handle a registration request for the application.
     *
     * @return mixed
     */
    public function register(Request $request) {
        $data = $request->all();
        $validated = $this->validator($data)->validate();

        $user = User::query()->create($validated);
        event(new Registered($user));

        $this->guard()->login($user);
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
    protected function registered(Request $request, $user) {
    }
}// end class
