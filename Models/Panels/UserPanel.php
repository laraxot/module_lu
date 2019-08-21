<?php
namespace Modules\LU\Models\Panels;

use Illuminate\Support\Str;
use Illuminate\Http\Request;

//--- Services --
use Modules\Extend\Services\StubService;
use Modules\Extend\Services\RouteService;

use Modules\Xot\Models\Panels\XotBasePanel;


<<<<<<< HEAD
class UserPanel extends XotBasePanel
{
=======
class UserPanel extends XotBasePanel{
>>>>>>> 8fdd9670f335166dfacb15a63a0c2c0250b7b156
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
	public static $search = [];

	/**
	 * Get the fields displayed by the resource.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return array
	 */
	public static function fields()
	{
		return array (
		(object) array(
			 'type' => 'Id',
			 'name' => 'auth_user_id',
		  ),
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
		  (object) array(
			 'type' => 'String',
			 'name' => 'handle',
		  ),
		  (object) array(
			 'type' => 'Password',
			 'name' => 'passwd',
<<<<<<< HEAD
=======
			 'col_bs_size'=>6,
>>>>>>> 8fdd9670f335166dfacb15a63a0c2c0250b7b156
		  ),
		  (object) array(
			 'type' => 'String',
			 'name' => 'email',
<<<<<<< HEAD
=======
			 'col_bs_size'=>6,
>>>>>>> 8fdd9670f335166dfacb15a63a0c2c0250b7b156
		  ),
		  (object) array(
			 'type' => 'String',
			 'name' => 'surname',
<<<<<<< HEAD
=======
			 'col_bs_size'=>6,
>>>>>>> 8fdd9670f335166dfacb15a63a0c2c0250b7b156
		  ),
		  (object) array(
			 'type' => 'String',
			 'name' => 'firstname',
<<<<<<< HEAD
=======
			 'col_bs_size'=>6,
>>>>>>> 8fdd9670f335166dfacb15a63a0c2c0250b7b156
		  ),
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
		  (object) array(
			 'type' => 'DateTime',
			 'name' => 'last_login_at',
<<<<<<< HEAD
=======
			 'col_bs_size'=>6,
>>>>>>> 8fdd9670f335166dfacb15a63a0c2c0250b7b156
		  ),
		  (object) array(
			 'type' => 'String',
			 'name' => 'last_login_ip',
<<<<<<< HEAD
=======
			 'col_bs_size'=>6,
>>>>>>> 8fdd9670f335166dfacb15a63a0c2c0250b7b156
		  ),
		);
	}
	

	public function with(){
		return [];
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
