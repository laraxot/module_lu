<?php

<<<<<<< HEAD
=======
declare(strict_types=1);

>>>>>>> 3c191b8b6e72c4241b48547e7460883dfd14b26c
namespace Modules\LU\Models\Panels;

use Illuminate\Http\Request;
//--- Services --
use Modules\Xot\Models\Panels\XotBasePanel;

/**
<<<<<<< HEAD
 * Class AreaPanel
 * @package Modules\LU\Models\Panels
=======
 * Class AreaPanel.
>>>>>>> 3c191b8b6e72c4241b48547e7460883dfd14b26c
 */
class AreaPanel extends XotBasePanel {
    /**
     * The model the resource corresponds to.
<<<<<<< HEAD
     *
     * @var string
=======
>>>>>>> 3c191b8b6e72c4241b48547e7460883dfd14b26c
     */
    protected static string $model = 'Modules\LU\Models\Area';

    /**
     * The single value that should be used to represent the resource when being displayed.
<<<<<<< HEAD
     *
     * @var string
=======
>>>>>>> 3c191b8b6e72c4241b48547e7460883dfd14b26c
     */
    protected static string $title = 'title';

    /**
     * The columns that should be searched.
<<<<<<< HEAD
     *
     * @var array
=======
>>>>>>> 3c191b8b6e72c4241b48547e7460883dfd14b26c
     */
    protected static array $search = [];

    public function search(): array {
        return []; //['area_id','area_define_name'];
    }

    /**
<<<<<<< HEAD
     * @param object $row
=======
>>>>>>> 3c191b8b6e72c4241b48547e7460883dfd14b26c
     * @return mixed
     */
    public function optionId(object $row) {
        return $row->area_id;
    }

<<<<<<< HEAD
    /**
     * @param object $row
     * @return string
     */
    public function optionLabel(object $row):string {
=======
    public function optionLabel(object $row): string {
>>>>>>> 3c191b8b6e72c4241b48547e7460883dfd14b26c
        return $row->area_define_name;
    }

    public function with(): array {
        return [];
    }

    /**
     * Get the fields displayed by the resource.
<<<<<<< HEAD
     *
     * @return array
=======
>>>>>>> 3c191b8b6e72c4241b48547e7460883dfd14b26c
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
<<<<<<< HEAD
     * @param Request $request
=======
>>>>>>> 3c191b8b6e72c4241b48547e7460883dfd14b26c
     * @return array
     */
    public function cards(Request $request) {
        return [];
    }

    /**
     * Get the filters available for the resource.
     *
<<<<<<< HEAD
     * @param Request|null $request
     *
=======
>>>>>>> 3c191b8b6e72c4241b48547e7460883dfd14b26c
     * @return array
     */
    public function filters(Request $request = null) {
        return [];
    }

    /**
     * Get the lenses available for the resource.
     *
<<<<<<< HEAD
     * @param Request $request
=======
>>>>>>> 3c191b8b6e72c4241b48547e7460883dfd14b26c
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
<<<<<<< HEAD
}
=======
}
>>>>>>> 3c191b8b6e72c4241b48547e7460883dfd14b26c
