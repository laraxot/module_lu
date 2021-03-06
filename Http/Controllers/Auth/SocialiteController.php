<?php

declare(strict_types=1);

namespace Modules\LU\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Laravel\Socialite\Facades\Socialite;
use Modules\LU\Models\SocialProvider;
use Modules\LU\Models\User;

/**
 * Class SocialiteController.
 */
class SocialiteController extends Controller {
    /**
     * @return mixed|string
     */
    public function redirectTo() {
        if (request()->has('referrer')) {
            return request()->input('referrer');
        }
        if (url()->previous() != url()->current()) {
            return url()->previous();
        }

        return '/';
    }

    /**
     * Redirect the user to the GitHub authentication page.
     *
     * @param string $provider
     *
     * @return \Illuminate\Http\Response
     */
    public function redirectToProvider($lang, $provider) {
        if ('facebook' != $provider) {
            return Socialite::driver($provider)->redirect();
        } else {
            return Socialite::driver($provider)
                ->stateless()
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

    //end redirectToProvider

    /**
     * Obtain the user information from GitHub.
     *
     * @param string $provider
     *
     * @return mixed
     */
    public function handleProviderCallback($lang, $provider) {
        try {
            $socialUser = Socialite::driver($provider)->stateless()->user();
        } catch (\Exception $e) {
            //dddx($e);
            return response()->redirectTo('/');
        }
        //ddd($socialUser);
        //getAvatar
        $socialProvider = SocialProvider::query()->where('provider_id', $socialUser->getId())
            ->where('provider', $provider)
            ->first();
        if (! $socialProvider) {
            $handle = $socialUser->getNickname();
            if ('' == $handle) {
                $handle = Str::slug($socialUser->getName());
            }
            $user = User::query()->firstOrCreate(
                [
                    'email' => $socialUser->getEmail(),
                ],
                [
                    'first_name' => $socialUser->getName(),
                    'handle' => $handle,
                    //'avatar_img' => $socialUser->getAvatar(),
                    //'social_login' => true //tell the database they are logging in from oauth
                ]
            );
            if ('' == $user->handle && '' != $handle) {
                $user->handle = $handle;
                $user->save();
            }

            $user->socialProviders()->create(
                [
                    'name' => $socialUser->getName(),
                    'email' => $socialUser->getEmail(),
                    'avatar' => $socialUser->getAvatar(),
                    'provider_id' => $socialUser->getId(),
                    'provider' => $provider,
                    'token' => $socialUser->token,
                ]
            );
        } else {
            $user = $socialProvider->user;
            //$socialProvider->token = $socialUser->token;
            //$socialProvider->save();
            $socialProvider->update(
                [
                    'name' => $socialUser->getName(),
                    'email' => $socialUser->getEmail(),
                    'avatar' => $socialUser->getAvatar(),
                    'provider_id' => $socialUser->getId(),
                    'provider' => $provider,
                    'token' => $socialUser->token,
                ]
            );
        }

        //$user=User::firstOrCreate(['email',$socialUser->getEmail()])
        $user->update([
            'last_login_at' => Carbon::now()->toDateTimeString(),
            'last_login_ip' => request()->getClientIp(),
        ]);
        Auth::login($user, true);
        //auth()->login($user);
        //echo '<h3> redirect to ['.$this->redirectTo().']</h3>';
        return redirect()->intended($this->redirectTo());
        // $user->token;
    }

    //end handleProviderCallback
}//end SocialiteController