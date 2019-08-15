<?php
namespace Modules\LU\Models\Panels;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Builder;

//--- Services --
use Modules\Extend\Services\StubService;
use Modules\Extend\Services\RouteService;


use Modules\Xot\Models\Panels\XotBasePanel;

class LUPanel extends XotBasePanel {
	/**
	 * The model the resource corresponds to.
	 *
	 * @var string
	 */
	public static $model = 'Modules\LU\Models\LU';

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
	* The relationships that should be eager loaded on index queries.
	*
	* @var array
	*/
	public static function with()
	{
	  return [];
	}

	public function search(){
		return [];
	}

	/**
	 * on select the option id
	 *
	 */

	public function optionId($row){
		return $row->area_id;
	}

	/**
	 * on select the option label 
	 *
	 */

	public function optionLabel($row){
		return $row->area_define_name;
	}

	/**
	 * Get the fields displayed by the resource.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return array

		'col_bs_size' => 6,
		'sortable' => 1,
		'rules' => 'required',
		'rules_messages' => ['it'=>['required'=>'Nome Obbligatorio']],
		'value'=>'..',

	 */
	public function indexNav(){
		return null;
	}

	/**
	 * Build an "index" query for the given resource.
	 *
	 * @param  Request  $request
	 * @param  \Illuminate\Database\Eloquent\Builder  $query
	 * @return \Illuminate\Database\Eloquent\Builder
	 */

	public static function indexQuery(Request $request, $query){
		//return $query->where('auth_user_id', $request->user()->auth_user_id);
		return $query; 
	}

	/**
	 * Build a "relatable" query for the given resource.
	 *
	 * This query determines which instances of the model may be attached to other resources.
	 *
	 * @param  Request  $request
	 * @param  \Illuminate\Database\Eloquent\Builder  $query
	 * @return \Illuminate\Database\Eloquent\Builder
	 */
	public static function relatableQuery(Request $request, $query){
		//return $query->where('auth_user_id', $request->user()->auth_user_id);
		 //return $query->where('user_id', $request->user()->id);
	}



	public static function fields()
	{
		return array (
  0 => 
  (object)(array(
     'type' => 'Id',
     'name' => 'auth_user_id',
     'rules' => 'required',
     'comment' => NULL,
  )),
  1 => 
  (object)(array(
     'type' => 'String',
     'name' => 'handle',
     'comment' => NULL,
  )),
  2 => 
  (object)(array(
     'type' => 'String',
     'name' => 'passwd',
     'comment' => NULL,
  )),
  3 => 
  (object)(array(
     'type' => 'DateTime',
     'name' => 'last_login_at',
     'comment' => NULL,
  )),
  4 => 
  (object)(array(
     'type' => 'String',
     'name' => 'last_login_ip',
     'comment' => NULL,
  )),
  5 => 
  (object)(array(
     'type' => 'Integer',
     'name' => 'owner_user_id',
     'comment' => NULL,
  )),
  6 => 
  (object)(array(
     'type' => 'Integer',
     'name' => 'owner_group_id',
     'comment' => NULL,
  )),
  7 => 
  (object)(array(
     'type' => 'String',
     'name' => 'is_active',
     'comment' => NULL,
  )),
  8 => 
  (object)(array(
     'type' => 'String',
     'name' => 'email',
     'comment' => NULL,
  )),
  9 => 
  (object)(array(
     'type' => 'Boolean',
     'name' => 'group_id',
     'comment' => NULL,
  )),
  10 => 
  (object)(array(
     'type' => 'Boolean',
     'name' => 'banned_id',
     'comment' => NULL,
  )),
  11 => 
  (object)(array(
     'type' => 'Boolean',
     'name' => 'country_id',
     'comment' => NULL,
  )),
  12 => 
  (object)(array(
     'type' => 'Integer',
     'name' => 'question_id',
     'comment' => NULL,
  )),
  13 => 
  (object)(array(
     'type' => 'String',
     'name' => 'nome',
     'comment' => NULL,
  )),
  14 => 
  (object)(array(
     'type' => 'String',
     'name' => 'cognome',
     'comment' => NULL,
  )),
  15 => 
  (object)(array(
     'type' => 'Integer',
     'name' => 'ente',
     'comment' => NULL,
  )),
  16 => 
  (object)(array(
     'type' => 'Integer',
     'name' => 'matr',
     'comment' => NULL,
  )),
  17 => 
  (object)(array(
     'type' => 'Integer',
     'name' => 'stabi',
     'comment' => NULL,
  )),
  18 => 
  (object)(array(
     'type' => 'Integer',
     'name' => 'repar',
     'comment' => NULL,
  )),
  19 => 
  (object)(array(
     'type' => 'String',
     'name' => 'password',
     'comment' => NULL,
  )),
  20 => 
  (object)(array(
     'type' => 'String',
     'name' => 'hash',
     'comment' => NULL,
  )),
  21 => 
  (object)(array(
     'type' => 'String',
     'name' => 'activation_code',
     'comment' => NULL,
  )),
  22 => 
  (object)(array(
     'type' => 'String',
     'name' => 'forgotten_password_code',
     'comment' => NULL,
  )),
  23 => 
  (object)(array(
     'type' => 'Date',
     'name' => 'birthday',
     'comment' => NULL,
  )),
  24 => 
  (object)(array(
     'type' => 'Integer',
     'name' => 'last_birthday',
     'comment' => NULL,
  )),
  25 => 
  (object)(array(
     'type' => 'Integer',
     'name' => 'dem_birthday',
     'comment' => NULL,
  )),
  26 => 
  (object)(array(
     'type' => 'String',
     'name' => 'sesso',
     'comment' => NULL,
  )),
  27 => 
  (object)(array(
     'type' => 'Boolean',
     'name' => 'giubbotto',
     'comment' => NULL,
  )),
  28 => 
  (object)(array(
     'type' => 'String',
     'name' => 'provincia',
     'comment' => NULL,
  )),
  29 => 
  (object)(array(
     'type' => 'String',
     'name' => 'conosciuto',
     'comment' => NULL,
  )),
  30 => 
  (object)(array(
     'type' => 'String',
     'name' => 'news',
     'comment' => NULL,
  )),
  31 => 
  (object)(array(
     'type' => 'String',
     'name' => 'citta',
     'comment' => NULL,
  )),
  32 => 
  (object)(array(
     'type' => 'Boolean',
     'name' => 'segno',
     'comment' => NULL,
  )),
  33 => 
  (object)(array(
     'type' => 'Boolean',
     'name' => 'hmail',
     'comment' => NULL,
  )),
  34 => 
  (object)(array(
     'type' => 'Boolean',
     'name' => 'bounce',
     'comment' => NULL,
  )),
  35 => 
  (object)(array(
     'type' => 'DateTime',
     'name' => 'dataIscrizione',
     'comment' => NULL,
  )),
  36 => 
  (object)(array(
     'type' => 'Integer',
     'name' => 'dataCancellazione',
     'comment' => NULL,
  )),
  37 => 
  (object)(array(
     'type' => 'DateTime',
     'name' => 'created_at',
     'comment' => NULL,
  )),
  38 => 
  (object)(array(
     'type' => 'DateTime',
     'name' => 'updated_at',
     'comment' => NULL,
  )),
  39 => 
  (object)(array(
     'type' => 'String',
     'name' => 'remember_token',
     'comment' => NULL,
  )),
  40 => 
  (object)(array(
     'type' => 'String',
     'name' => 'updated_by',
     'comment' => NULL,
  )),
  41 => 
  (object)(array(
     'type' => 'String',
     'name' => 'created_by',
     'comment' => NULL,
  )),
  42 => 
  (object)(array(
     'type' => 'DateTime',
     'name' => 'email_verified_at',
     'comment' => NULL,
  )),
  43 => 
  (object)(array(
     'type' => 'String',
     'name' => 'deleted_by',
     'comment' => NULL,
  )),
  44 => 
  (object)(array(
     'type' => 'String',
     'name' => 'firstname',
     'comment' => NULL,
  )),
  45 => 
  (object)(array(
     'type' => 'String',
     'name' => 'surname',
     'comment' => NULL,
  )),
  46 => 
  (object)(array(
     'type' => 'String',
     'name' => 'token_check',
     'comment' => NULL,
  )),
  47 => 
  (object)(array(
     'type' => 'Boolean',
     'name' => 'is_verified',
     'comment' => NULL,
  )),
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
	public function actions(Request $request=null)
	{
		return [];
	}

}
