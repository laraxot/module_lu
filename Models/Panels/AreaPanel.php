<?php

namespace Modules\LU\Models\Panels;

use Illuminate\Http\Request;
//--- Services --
use Modules\Xot\Models\Panels\XotBasePanel;

class AreaPanel extends XotBasePanel {
    /**
     * The model the resource corresponds to.
     *
     * @var string
     */
    protected static $model = 'Modules\LU\Models\Area';

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

    public function search() {
        return []; //['area_id','area_define_name'];
    }

    public function optionId($row) {
        return $row->area_id;
    }

    public function optionLabel($row) {
        return $row->area_define_name;
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
    public function fields() {
        return [
            (object) [
                'type' => 'Id',
                'name' => 'area_id',
            ],
            (object) [
                'type' => 'String',
                'name' => 'area_define_name',
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
        return [
            new Actions\SyncAreas(),
        ];
    }

    public function bodyContentView($params = []) {
        //ddd($params);
        extract($params);
        //$route_params = \Route::current()->parameters();
        //list($containers,$items)=params2ContainerItem($route_params);
        if ('index_edit' == $_layout->act) {
            return $_layout->view_extend.'.body.multi_select';
        } else {
            return $_layout->view_extend.'.body_content'; //.'.index';
        }
        //return $_layout->view_extend.'.body.rating';
    }
}
