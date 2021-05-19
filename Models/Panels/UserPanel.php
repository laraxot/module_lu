<?php

declare(strict_types=1);

namespace Modules\LU\Models\Panels;

use Illuminate\Http\Request;
//--- Services --
use Modules\Xot\Models\Panels\XotBasePanel;

/**
 * Class UserPanel.
 */
class UserPanel extends XotBasePanel {
    /**
     * The model the resource corresponds to.
     */
    protected static string $model = 'Modules\LU\Models\User';

    /**
     * The single value that should be used to represent the resource when being displayed.
     */
    protected static string $title = 'title';

    /**
     * The columns that should be searched.
     */
    protected static array $search = [];

    /**
     * Get the fields displayed by the resource.
     *
     * @return array
     */
    public function fullnameFields() {
        return [
            (object) [
                'type' => 'String',
                'name' => 'last_name',
                'col_bs_size' => 6,
            ],
            (object) [
                'type' => 'String',
                'name' => 'first_name',
                'col_bs_size' => 6,
            ],
            (object) [
                'type' => 'String',
                'name' => 'email',
                'col_bs_size' => 12,
            ],
        ];
    }

    /**
     * @return object[]
     */
    public function lastLoginFields() {
        return [
            (object) [
                'type' => 'DateTime',
                'name' => 'last_login_at',
                'col_bs_size' => 6,
                'except' => ['edit', 'create'],
            ],
            (object) [
                'type' => 'String',
                'name' => 'last_login_ip',
                'col_bs_size' => 6,
                'except' => ['edit', 'create'],
            ],
        ];
    }

    /**
     * @return object[]
     */
    public function fields(): array {
        return [
            (object) [
                'type' => 'Id',
                'name' => 'auth_user_id',
            ],
            (object) [
                'type' => 'String',
                'name' => 'handle',
            ],
            //*
            (object) [
                'type' => 'Password',
                'name' => 'passwd',
                'col_bs_size' => 12,
                'except' => ['index'],
            ],
            (object) [
                'type' => 'Cell',
                'name' => 'full_name',
                'fields' => $this->fullnameFields(),
            ],
            /*
            (object) [
                'type' => 'String',
                'name' => 'last_name',
                'col_bs_size' => 6,
            ],
            (object) [
                'type' => 'String',
                'name' => 'first_name',
                'col_bs_size' => 6,
            ],
            (object) [
                'type' => 'String',
                'name' => 'email',
                'col_bs_size' => 12,
            ],
            */
            (object) [
                'type' => 'Cell',
                'name' => 'last_login',
                'fields' => $this->lastLoginFields(),
            ],
            /*
            (object) [
                'type' => 'DateTime',
                'name' => 'last_login_at',
                'col_bs_size' => 6,
                'except' => ['edit', 'create'],
            ],
            (object) [
                'type' => 'String',
                'name' => 'last_login_ip',
                'col_bs_size' => 6,
                'except' => ['edit', 'create'],
            ],
            */
            (object) [
                'type' => 'MultiCheckbox',
                'name' => 'areas',
                'col_bs_size' => 6,
            ],
            (object) [
                'type' => 'MultiCheckbox',
                'name' => 'groups',
                'col_bs_size' => 6,
            ],
            (object) [
                'type' => 'MultiCheckbox',
                'name' => 'rights',
                'col_bs_size' => 6,
            ],

            //*/
        ];
    }

    public function with(): array {
        return [];
    }

    /**
     * Get the tabs available.
     */
    public function tabs(): array {
        $tabs_name = ['area', 'group', 'perm', 'right'];

        return $tabs_name;
    }

    /**
     * Get the cards available for the request.
     *
     * @return array
     */
    public function cards(Request $request) {
        return [];
    }

    /**
     * Get the filters available for the resource.
     *
     * @return array
     */
    public function filters(Request $request = null) {
        return [];
    }

    /**
     * Get the lenses available for the resource.
     *
     * @return array
     */
    public function lenses(Request $request) {
        return [];
    }

    /**
     * Get the actions available for the resource.
     *
     * @return array
     */
    public function actions() {
        return [
            // new Actions\TestUsersWithLivewireAction(),
            new Actions\TestAction(),
        ];
    }

    /**
     * @return mixed
     */
    public function areas() {
        $areas = $this->row->areaAdminAreas;

        return $areas;
    }

    /**
     * @return bool
     */
    public function isSuperAdmin() {
        $user = $this->row;
        if (is_object($user->perm) && $user->perm->perm_type >= 4) {  //superadmin
            return true;
        }

        return false;
    }

    /**
     * @return mixed
     */
    public function name() {
        return $this->row->handle;
    }

    /**
     * @param int $size
     *
     * @return string
     */
    public function avatar($size = 100) {
        $email = \md5(\mb_strtolower(\trim($this->row->email)));
        $default = \urlencode('https://tracker.moodle.org/secure/attachment/30912/f3.png');

        return "https://www.gravatar.com/avatar/$email?d=$default&s=$size";
    }
}