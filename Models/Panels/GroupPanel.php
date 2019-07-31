<?php
namespace Modules\LU\Models\Panels;

use Illuminate\Support\Str;
use Illuminate\Http\Request;

//--- Services --
use Modules\Extend\Services\StubService;
use Modules\Extend\Services\RouteService;

use Modules\Xot\Models\Panels\XotBasePanel;


class GroupPanel extends XotBasePanel
{
    /**
     * The model the resource corresponds to.
     *
     * @var string
     */
    public static $model = 'Modules\LU\Models\Group';

    /**
     * The single value that should be used to represent the resource when being displayed.
     *
     * @var string
     */
    public static $title = "title"; 

    /**
     * The columns that should be searched.
     *
     * @var array
     */
    public static $search = array (
) ;

    public function optionId($row){
        return $row->group_id;
    }

    public function optionLabel($row){
        return  $this->group_id.'] '.$this->group_define_name;
    }
    public function with(){
        return [];
    } 
    
    /**
     * Get the fields displayed by the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public static function fields()
    {
        return array (
  0 => 
  (object) array(
     'type' => 'Integer',
     'name' => 'group_id',
  ),
  1 => 
  (object) array(
     'type' => 'Integer',
     'name' => 'group_type',
  ),
  2 => 
  (object) array(
     'type' => 'String',
     'name' => 'group_define_name',
  ),
  3 => 
  (object) array(
     'type' => 'Integer',
     'name' => 'owner_user_id',
  ),
  4 => 
  (object) array(
     'type' => 'Integer',
     'name' => 'owner_group_id',
  ),
  5 => 
  (object) array(
     'type' => 'String',
     'name' => 'is_active',
  ),
);
    }
     
    /**
     * Get the tabs available 
     *
     * @return array  
     */
    public function tabs(){
        $tabs_name = [];
        return RouteService::tabs([
            'tabs_name'=>$tabs_name,
            'model'=>self::$model
        ]);
        
    }
    /**
     * Get the cards available for the request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function cards(Request $request)
    {
        return [];
    }

    /**
     * Get the filters available for the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function filters(Request $request=null)
    {
        return [];
    }

    /**
     * Get the lenses available for the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function lenses(Request $request)
    {
        return [];
    }

    /**
     * Get the actions available for the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function actions()
    {
        return [];
    }

}
