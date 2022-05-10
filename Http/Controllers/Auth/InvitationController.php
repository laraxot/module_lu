<?php

declare(strict_types=1);

namespace Modules\LU\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
// use Illuminate\Foundation\Auth\SendsPasswordResetEmails;

// --- requests
use Modules\LU\Http\Requests\StoreInvitationRequest;
// --- models --
use Modules\LU\Models\Invitation;
// --- services --
use Modules\Theme\Services\ThemeService;

/**
 * Class InvitationController.
 */
class InvitationController extends Controller {
    /**
     * @return mixed
     */
    public function create() {
        // return ThemeService::view()->with('title', 'invitation');
        $view = ThemeService::view()->render();

        $view_params = [
            'view' => $view,
            'title' => 'invitation',
        ];

        return view()->make($view)->with($view_params);
    }

    /**
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(StoreInvitationRequest $request) {
        $invitation = new Invitation($request->all());
        $invitation->generateInvitationToken();
        $invitation->save();

        return redirect()->route('requestInvitation')
            ->with('success', 'Invitation to register successfully requested. Please wait for registration link.');
    }
}// end class
