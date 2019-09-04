<?php

namespace Modules\LU\Models\Panels;

use Illuminate\Http\Request;
//--- Services --
use Modules\Xot\Models\Panels\XotBasePanel;
use Modules\Xot\Services\RouteService;

class AreaPanel extends XotBasePanel {
    /**
     * The model the resource corresponds to.
     *
     * @var string
     */
    public static $model = 'Modules\LU\Models\Area';

    /**
     * The single value that should be used to represent the resource when being displayed.
     *
     * @var string
     */
    public static $title = 'title';

    /**
     * The columns that should be searched.
     *
     * @var array
     */
    public static $search = [];

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
    public static function fields() {
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
        return [
            new Actions\SyncAreas(),
        ];
    }

    /*
    public static function elaborateRequest(Request $request,$query){
        if(($request->ajax() && $request->has('query')) || $request->has('debug')) {
            $lang=\App::getLocale();
            $q=$request->input('query');
            $rows=$query->select('area_id as id','area_define_name as label')
                    ->where('area_define_name','like','%'.$q.'%')
                    ->limit(10)
                        ->get()
                        ->toJson();
            //
            //$rows=Post::select('post_id as id','title as label')
            //            ->where('title','like','%'.$q.'%')
            //            ->where('post_type','cuisine_cat')
            //            ->where('lang',$lang)
            //            ->limit(10)
            //            ->get()
            //            ->toJson();
            //

            die($rows);
        }
    }

    public static function indexQuery(Request $request,$query){
        self::elaborateRequest($request,$query);
        return $query;
    }
    */

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
