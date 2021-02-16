<?php

namespace Modules\LU\Models\Panels;

use Illuminate\Http\Request;
//--- Services --
use Modules\Xot\Models\Panels\XotBasePanel;

/**
 * Class GroupPanel
 * @package Modules\LU\Models\Panels
 */
class GroupPanel extends XotBasePanel {
    /**
     * The model the resource corresponds to.
     *
     * @var string
     */
    protected static string $model = 'Modules\LU\Models\Group';

    /**
     * The single value that should be used to represent the resource when being displayed.
     *
     * @var string
     */
    protected static string $title = 'title';

    /**
     * The columns that should be searched.
     *
     * @var array
     */
    protected static array $search = [];

    /**
     * @param object $row
     * @return mixed
     */
    public function optionId(object $row) {
        return $row->group_id;
    }

    /**
     * @param object $row
     * @return string
     */
    public function optionLabel(object $row):string {
        return  $row->group_id.'] '.$row->group_define_name;
    }

    public function with(): array {
        return [];
    }

    /**
     * Get the fields displayed by the resource.
     *
     * @return array
     */
    public function fields(): array {
        return [
            (object) [
                'type' => 'Integer',
                'name' => 'group_id',
            ],
            (object) [
                'type' => 'Integer',
                'name' => 'group_type',
            ],
            (object) [
                'type' => 'String',
                'name' => 'group_define_name',
            ],
            (object) [
                'type' => 'Integer',
                'name' => 'owner_user_id',
            ],
            (object) [
                'type' => 'Integer',
                'name' => 'owner_group_id',
            ],
            (object) [
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
     * @param Request $request
     * @return array
     */
    public function cards(Request $request) {
        return [];
    }

    /**
     * Get the filters available for the resource.
     *
     * @param Request|null $request
     *
     * @return array
     */
    public function filters(Request $request = null) {
        return [];
    }

    /**
     * Get the lenses available for the resource.
     *
     * @param Request $request
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
        return [];
    }

    /* deprecated
<<<<<<< HEAD
    public function bodyContentView($params = []) {
=======
    public function bodyContentView(array $params = []) {
>>>>>>> ae14cf9 (first)
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
    */
}
