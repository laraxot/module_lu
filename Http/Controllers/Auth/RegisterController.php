<?php

declare(strict_types=1);

namespace Modules\LU\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Auth\Events\Registered;
use Illuminate\Foundation\Auth\RegistersUsers;
// --------- Models ------------
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Modules\LU\Events\Registered0;
use Modules\LU\Models\User;
use Modules\LU\Notifications\VerifyEmailRegister3;
use Modules\Xot\Datas\XotData;

/**
 * Class RegisterController.
 */
class RegisterController extends Controller {
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    public XotData $xot;

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
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data) {
        return Validator::make(
            $data,
            [
                // 'name' => 'required|max:255',
                'handle' => 'required|max:255',
                'email' => 'required|email|max:255|unique:liveuser_general.users', // |unique:users
                'password' => 'required|min:6|confirmed',
            ]
        );
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

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\JsonResponse|string
     */
    public function showRegistrationForm(Request $request) {
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
        $register_type = $this->xot->register_type;

        $func = 'registerType'.$register_type;

        return $this->{$func}($request);
        
    }
}// end class
