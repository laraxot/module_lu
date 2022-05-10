<?php

declare(strict_types=1);

namespace Modules\LU\Http\Middleware;

// https://laraveldaily.com/laravel-auth-make-registration-invitation-only/
// https://github.com/LaravelDaily/Laravel-Auth-Invitations

use Closure;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Modules\LU\Models\Invitation;

/**
 * Class HasInvitation.
 */
class HasInvitation {
    /**
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector|mixed
     */
    public function handle($request, Closure $next) {
        /*
         * Only for GET requests. Otherwise, this middleware will block our registration.
         */
        if ($request->isMethod('get')) {
            /*
             * No token = Goodbye.
             */
            if (! $request->has('invitation_token')) {
                return redirect(route('requestInvitation'));
            }

            $invitation_token = $request->get('invitation_token');

            /*
             * Lets try to find invitation by its token.
             * If failed -> return to request page with error.
             */
            try {
                $invitation = Invitation::query()
                    ->where('invitation_token', $invitation_token)
                    ->firstOrFail();
            } catch (ModelNotFoundException $e) {
                return redirect(route('requestInvitation'))
                    ->with('error', 'Wrong invitation token! Please check your URL.');
            }

            /*
             * Let's check if users already registered.
             * If yes -> redirect to login with error.
             */
            if (null !== $invitation->registered_at) {
                return redirect(route('login'))->with('error', 'The invitation link has already been used.');
            }
        }

        return $next($request);
    }
}
