<?php

declare(strict_types=1);

namespace Modules\LU\Models\Panels;

use Illuminate\Http\Request;
// --- Services --

use Modules\Cms\Models\Panels\XotBasePanel;

class OauthClientPanel extends XotBasePanel
{
    /**
     * The model the resource corresponds to.
     */
    public static string $model = 'OauthClient';

    /**
     * The single value that should be used to represent the resource when being displayed.
     */
    public static string $title = 'title';

    /**
     * Get the fields displayed by the resource.
        'value'=>'..',
     */
    public function fields(): array
    {
        return [
            0 => (object) [
                'type' => 'Text',
                'name' => 'id',
                'comment' => 'not in Doctrine',
            ],
            1 => (object) [
                'type' => 'Text',
                'name' => 'user_id',
                'comment' => 'not in Doctrine',
            ],
            2 => (object) [
                'type' => 'Text',
                'name' => 'name',
                'comment' => 'not in Doctrine',
            ],
            3 => (object) [
                'type' => 'Text',
                'name' => 'secret',
                'comment' => 'not in Doctrine',
            ],
            4 => (object) [
                'type' => 'Text',
                'name' => 'provider',
                'comment' => 'not in Doctrine',
            ],
            5 => (object) [
                'type' => 'Text',
                'name' => 'redirect',
                'comment' => 'not in Doctrine',
            ],
            6 => (object) [
                'type' => 'Text',
                'name' => 'personal_access_client',
                'comment' => 'not in Doctrine',
            ],
            7 => (object) [
                'type' => 'Text',
                'name' => 'password_client',
                'comment' => 'not in Doctrine',
            ],
            8 => (object) [
                'type' => 'Text',
                'name' => 'revoked',
                'comment' => 'not in Doctrine',
            ],
        ];
    }

    /**
     * Get the tabs available.
     */
    public function tabs(): array
    {
        $tabs_name = [];

        return $tabs_name;
    }

    /**
     * Get the cards available for the request.
     */
    public function cards(Request $request): array
    {
        return [];
    }

    /**
     * Get the filters available for the resource.
     *
     * @param \Illuminate\Http\Request $request
     */
    public function filters(Request $request = null): array
    {
        return [];
    }

    /**
     * Get the lenses available for the resource.
     */
    public function lenses(Request $request): array
    {
        return [];
    }

    /**
     * Get the actions available for the resource.
     */
    public function actions(): array
    {
        return [];
    }
}
