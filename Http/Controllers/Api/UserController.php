<?php

declare(strict_types=1);

namespace Modules\LU\Http\Controllers\Api;

//modules
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Modules\LU\Models\User;

class UserController extends Controller {
    public function login(Request $request) {
        //validate the login request
        $login = $request->validate([
            'email' => 'required|email',
            'password' => 'required|string',
        ]);

        $user = User::query()->where('email', $login['email'])->first();
        if (is_object($user) && $user->passwd == \md5($login['password'])) {
            Auth::login($user, true);
        }

        //if request not valid return unauthenticated state
        //if (! Auth::attempt($login)) {
        if (! Auth::check()) {
            return response()->json([
                'status' => '401',
                'response' => 'Credentials are invalid',
            ]);
        }
        //if login succeed issue an access token for our user
        $token = Auth::user()->createToken('Token Name')->accessToken;

        return response()->json([
            'status' => '200',
            'response' => 'Authorized',
            'token' => $token,
        ]);
    }

    public function loginTest(Request $request) {
        $login = [
            'email' => 'marco.sottana@gmail.com',
            'password' => 'prova123',
        ];

        $user = User::query()->where('email', $login['email'])->first();
        if (is_object($user) && $user->passwd == \md5($login['password'])) {
            Auth::login($user, true);
        }

        //if request not valid return unauthenticated state
        //if (! Auth::attempt($login)) {
        if (! Auth::check()) {
            return response()->json([
                'status' => '401',
                'response' => 'Credentials are invalid',
            ]);
        }

        //if login succeed issue an access token for our user
        $token = Auth::user()->createToken('Token Name')->accessToken;

        return response()->json([
            'status' => '200',
            'response' => 'Authorized',
            'token' => $token,
        ]);
    }

    public function logout(Request $request) {
        exit('LOGOUT');
    }

    /**
     * handle user registration request.
     */
    public function registerUserExample(Request $request) {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:8',
        ]);
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);

        $access_token_example = $user->createToken('PassportExample@Section.io')->access_token;
        //return the access token we generated in the above step
        return response()->json(['token' => $access_token_example], 200);
    }

    public function getCurrentUser() {
        return response()->json(['user' => Auth::user()]);
    }
}
