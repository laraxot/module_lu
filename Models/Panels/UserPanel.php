<?php

namespace Modules\LU\Models\Panels;

use Illuminate\Http\Request;
//--- Services --
use Modules\Xot\Models\Panels\XotBasePanel;
use Modules\Xot\Services\RouteService;

class UserPanel extends XotBasePanel {
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
    public static function fields() {
        return [
        (object) [
             'type' => 'Id',
             'name' => 'auth_user_id',
          ],
           /*
          (object) array(
             'type' => 'Integer',
             'name' => 'ente',
          ),
          (object) array(
             'type' => 'Integer',
             'name' => 'matr',
          ),
          */
          (object) [
             'type' => 'String',
             'name' => 'handle',
          ],
          (object) [
             'type' => 'Password',
             'name' => 'passwd',
             'col_bs_size' => 6,
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
          /*
          (object) array(
             'type' => 'String',
             'name' => 'cognome',
          ),
          (object) array(
             'type' => 'String',
             'name' => 'nome',
          ),
          */
          (object) [
             'type' => 'DateTime',
             'name' => 'last_login_at',
             'col_bs_size' => 6,
          ],
          (object) [
             'type' => 'String',
             'name' => 'last_login_ip',
             'col_bs_size' => 6,
          ],
        ];
    }

    public function with() {
        return [];
    }

    /**
     * Get the tabs available.
     *
     * @return array
     */
    public function tabs() {
        $tabs_name = ['area', 'group', 'perm_user', 'right'];

        return RouteService::tabs([
            'tabs_name' => $tabs_name,
            'model' => self::$model,
        ]);
    }

    /**
     * Get the cards available for the request.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return array
     */
    public function cards(Request $request) {
        return [];
    }

    /**
     * Get the filters available for the resource.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return array
     */
    public function filters(Request $request = null) {
        return [];
    }

    /**
     * Get the lenses available for the resource.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return array
     */
    public function lenses(Request $request) {
        return [];
    }

    /**
     * Get the actions available for the resource.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return array
     */
    public function actions() {
        return [];
    }
}
