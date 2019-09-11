<?php

namespace Modules\LU\Models\Panels;

use Illuminate\Http\Request;
//--- Services --
use Modules\Xot\Models\Panels\XotBasePanel;
use Modules\Xot\Services\RouteService;

class GroupPanel extends XotBasePanel {
    /**
     * The model the resource corresponds to.
     *
     * @var string
     */
    protected static $model = 'Modules\LU\Models\Group';

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
    protected static $search = [
];

    public function optionId($row) {
        return $row->group_id;
    }

    public function optionLabel($row) {
        return  $this->group_id.'] '.$this->group_define_name;
    }

    public function with() {
        return [];
    }

    /**
     * Get the fields displayed by the resource.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return array
     */
    public static function fields() {
        return [
  0 => (object) [
     'type' => 'Integer',
     'name' => 'group_id',
  ],
  1 => (object) [
     'type' => 'Integer',
     'name' => 'group_type',
  ],
  2 => (object) [
     'type' => 'String',
     'name' => 'group_define_name',
  ],
  3 => (object) [
     'type' => 'Integer',
     'name' => 'owner_user_id',
  ],
  4 => (object) [
     'type' => 'Integer',
     'name' => 'owner_group_id',
  ],
  5 => (object) [
     'type' => 'String',
     'name' => 'is_active',
  ],
];
    }

    /**
     * Get the tabs available.
     *
     * @return array
     */
    public function tabs() {
        $tabs_name = [];

        return [];
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
