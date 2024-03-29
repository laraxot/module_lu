<?php

declare(strict_types=1);

namespace Modules\LU\Http\Controllers\Api;

// modules
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Modules\LU\Http\Controllers\BaseController;
use Modules\LU\Models\User;

class UserController extends BaseController {
    public function login(Request $request): JsonResponse {
        // validate the login request
        $login = $request->validate([
            'email' => 'required|email',
            'password' => 'required|string',
        ]);

        $user = User::query()->where('email', $login['email'])->first();
        if (\is_object($user) && $user->passwd === md5($login['password'])) {
            Auth::login($user, true);
        }

        // if request not valid return unauthenticated state
        // if (! Auth::attempt($login)) {
        if (! Auth::check()) {
            return response()->json([
                'status' => '401',
                'response' => 'Credentials are invalid',
            ]);
        }
        // if login succeed issue an access token for our user
        // if (null === Auth::user()) {
        if (null == $user) {
            throw new \Exception('['.__LINE__.']['.class_basename(__CLASS__).']');
        }
        // $token = Auth::user()->createToken('Token Name')->accessToken;
        $token = $user->createToken('Token Name')->accessToken;

        return response()->json([
            'status' => '200',
            'response' => 'Authorized',
            'token' => $token,
        ]);
    }

    public function loginTest(Request $request): JsonResponse {
        $login = [
            'email' => 'marco.sottana@gmail.com',
            'password' => 'prova123',
        ];

        $user = User::query()->where('email', $login['email'])->first();
        if (\is_object($user) && $user->passwd === md5($login['password'])) {
            Auth::login($user, true);
        }

        // if request not valid return unauthenticated state
        // if (! Auth::attempt($login)) {
        if (! Auth::check()) {
            return response()->json([
                'status' => '401',
                'response' => 'Credentials are invalid',
            ]);
        }

        // if login succeed issue an access token for our user
        // if (null === Auth::user()) {
        if (null === $user) {
            throw new \Exception('['.__LINE__.']['.class_basename(__CLASS__).']');
        }
        // $token = Auth::user()->createToken('Token Name')->accessToken;
        $token = $user->createToken('Token Name')->accessToken;

        return response()->json([
            'status' => '200',
            'response' => 'Authorized',
            'token' => $token,
        ]);
    }

    public function logout(Request $request): string {
        exit('LOGOUT');
    }

    /*
     * handle user registration request.

    public function registerUserExample(Request $request): JsonResponse {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:8',
        ]);

        if (! is_string($request->password)) {
            throw new Exception('['.__LINE__.']['.class_basename(__CLASS__).']');
        }

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);

        //Access to an undefined property Laravel\Passport\PersonalAccessTokenResult::$access_token
        $access_token_example = $user->createToken('PassportExample@Section.io')->access_token;
        // return the access token we generated in the above step
        return response()->json(['token' => $access_token_example], 200);
    }
    */
    public function getCurrentUser(): JsonResponse {
        return response()->json(['user' => Auth::user()]);
    }
}
