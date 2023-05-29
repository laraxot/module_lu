<?php

declare(strict_types=1);

namespace Modules\LU\Http\Controllers\Auth;

use Modules\Cms\Contracts\PanelContract;
// use Illuminate\Foundation\Auth\SendsPasswordResetEmails;

// --- requests
// --- models --
use Modules\LU\Http\Controllers\BaseController;
// --- services --
use Modules\LU\Http\Requests\StoreInvitationRequest;
use Modules\LU\Models\Invitation;
use Modules\UI\Services\ThemeService;

/**
 * Class InvitationController.
 */
class InvitationController extends BaseController {
    public PanelContract $panel;

    /**
     * @return mixed
     */
    public function create() {
        // return ThemeService::v1iew()->with('title', 'invitation');
        // $view = ThemeService::v1iew()->render();
        $view = $this->panel->getView();
        $view_params = [
            // 'row' => $row,
        ];

        $view = view($view, $view_params)->render();

        $view_params = [
            'view' => $view,
            'title' => 'invitation',
        ];

        return view($view)->with($view_params);
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
