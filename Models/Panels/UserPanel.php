<?php

namespace Modules\LU\Models\Panels;

use Illuminate\Http\Request;
//--- Services --
use Modules\Xot\Models\Panels\XotBasePanel;

class UserPanel extends XotBasePanel
{
    /**
     * The model the resource corresponds to.
     *
     * @var string
     */
    protected static $model = 'Modules\LU\Models\User';

    /**
     * The single value that should be used to represent the resource when being displayed.
     *
     * @var string
     */
    protected static $title = 'title';

    /**
     * The columns that should be searched.
     *
     * @var array
     */
    protected static $search = [];

    /**
     * Get the fields displayed by the resource.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return array
     */
    public function fields()
    {
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
             'except' => ['edit'],
          ],
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
             'col_bs_size' => 6,
          ],
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
          //*/
        ];
    }

    public function with()
    {
        return [];
    }

    /**
     * Get the tabs available.
     *
     * @return array
     */
    public function tabs()
    {
        $tabs_name = ['area', 'group', 'perm_user', 'right'];

        return $tabs_name;
    }

    /**
     * Get the cards available for the request.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return array
     */
    public function cards(Request $request)
    {
        return [];
    }

    /**
     * Get the filters available for the resource.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return array
     */
    public function filters(Request $request = null)
    {
        return [];
    }

    /**
     * Get the lenses available for the resource.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return array
     */
    public function lenses(Request $request)
    {
        return [];
    }

    /**
     * Get the actions available for the resource.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return array
     */
    public function actions()
    {
        return [];
    }

    public function areas()
    {
        $areas = $this->row->areaAdminAreas;

        return $areas;
    }

    public function isSuperAdmin()
    {
        $user = $this->row;
        if (is_object($user->perm) && $user->perm->perm_type >= 4) {  //superadmin
            return true;
        }

        return false;
    }

    public function name()
    {
        return $this->row->handle;
    }

    public function avatar($size = 100)
    {
        $email = \md5(\mb_strtolower(\trim($this->row->email)));
        $default = \urlencode('https://tracker.moodle.org/secure/attachment/30912/f3.png');

        return "https://www.gravatar.com/avatar/$email?d=$default&s=$size";
    }
}
