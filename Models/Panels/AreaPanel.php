<?php

declare(strict_types=1);

namespace Modules\LU\Models\Panels;

use Illuminate\Http\Request;
//--- Services --
use Modules\Xot\Models\Panels\XotBasePanel;

/**
 * Class AreaPanel.
 */
class AreaPanel extends XotBasePanel {
    /**
     * The model the resource corresponds to.
     */
    protected static string $model = 'Modules\LU\Models\Area';

    /**
     * The single value that should be used to represent the resource when being displayed.
     */
    protected static string $title = 'title';

    /**
     * The columns that should be searched.
     */
    protected static array $search = [];

    public function search(): array {
        return []; //['area_id','area_define_name'];
    }

    /**
     * @return mixed
     */
    public function optionId(object $row) {
        return $row->area_id;
    }

    public function optionLabel(object $row): string {
        return $row->area_define_name;
    }

    public function with(): array {
        return [];
    }

    /**
     * Get the fields displayed by the resource.
     */
    public function fields(): array {
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
        $tabs_name = ['user', 'perm'];

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
            new Actions\SyncAreas(),
            new Actions\TestUsersWithLivewireAction(),
        ];
    }

    /* deprecated ??
    public function bodyContentView(array $params = []) {
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
