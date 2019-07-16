<?php
namespace Modules\LU\Models\Panels;

use Laravel\Nova\Fields\ID;
use Illuminate\Http\Request;

//--- Services --
use Modules\Extend\Services\StubService;
use Modules\Extend\Services\RouteService;


class UserPanel 
{
    /**
     * The model the resource corresponds to.
     *
     * @var string
     */
    public static $model = 'Modules\LU\Models\User';

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
     'name' => 'ente',
  ),
  1 => 
  (object) array(
     'type' => 'Integer',
     'name' => 'matr',
  ),
  2 => 
  (object) array(
     'type' => 'String',
     'name' => 'handle',
  ),
  3 => 
  (object) array(
     'type' => 'String',
     'name' => 'passwd',
  ),
  4 => 
  (object) array(
     'type' => 'String',
     'name' => 'email',
  ),
  5 => 
  (object) array(
     'type' => 'String',
     'name' => 'surname',
  ),
  6 => 
  (object) array(
     'type' => 'String',
     'name' => 'firstname',
  ),
  7 => 
  (object) array(
     'type' => 'String',
     'name' => 'cognome',
  ),
  8 => 
  (object) array(
     'type' => 'String',
     'name' => 'nome',
  ),
  9 => 
  (object) array(
     'type' => 'DateTime',
     'name' => 'last_login_at',
  ),
  10 => 
  (object) array(
     'type' => 'String',
     'name' => 'last_login_ip',
  ),
);
    }
     
    /**
     * Get the tabs available 
     *
     * @return array  
     */
    public function tabs(){
        $tabs_name =  ['area','group','perm_user','right'];
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
    public function filters(Request $request)
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
    public function actions(Request $request)
    {
        return [];
    }

}
