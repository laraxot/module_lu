<?php

namespace Modules\LU\Models\Panels;

use Illuminate\Http\Request;
use Modules\Xot\Contracts\RowsContract;
//--- Services --

use Modules\Xot\Models\Panels\XotBasePanel;

class OauthClientPanel extends XotBasePanel {
    /**
     * The model the resource corresponds to.
     *
     * @var string
     */
    public static string $model = 'OauthClient';

    /**
     * The single value that should be used to represent the resource when being displayed.
     *
     * @var string
     */
    public static string $title = 'title';

    /**
     * The columns that should be searched.
     *
     * @var array
     */
    public static $search = array (
);

    /**
     * The relationships that should be eager loaded on index queries.
     *
     */
    public function with():array {
        return [];
    }

    public function search() :array {

        return [];
    }

    /**
     * on select the option id
     *
     * quando aggiungi un campo select, è il numero della chiave
     * che viene messo come valore su value="id"
     *
     * @param OauthClient $row
     *
     * @return int|string|null
     */
    public function optionId($row) {
        return $row->getKey();
    }

    /**
     * on select the option label.
     */
    public function optionLabel($row):string {
        return (string)$row->area_define_name;
    }

    /**
     * index navigation.
     */
    public function indexNav(): ?\Illuminate\Contracts\Support\Renderable {
        return null;
    }

    /**
     * Build an "index" query for the given resource.
     *
     * @param RowsContract $query
     *
     * @return RowsContract
     */
    public static function indexQuery(array $data, $query)
    {
        //return $query->where('user_id', $request->user()->id);
        return $query;
    }



    /**
     * Get the fields displayed by the resource.
     *
     * @return array
        'col_size' => 6,
        'sortable' => 1,
        'rules' => 'required',
        'rules_messages' => ['it'=>['required'=>'Nome Obbligatorio']],
        'value'=>'..',
     */
    public function fields(): array {
        return array (
  0 =>
  (object) array(
     'type' => 'Text',
     'name' => 'id',
     'comment' => 'not in Doctrine',
  ),
  1 =>
  (object) array(
     'type' => 'Text',
     'name' => 'user_id',
     'comment' => 'not in Doctrine',
  ),
  2 =>
  (object) array(
     'type' => 'Text',
     'name' => 'name',
     'comment' => 'not in Doctrine',
  ),
  3 =>
  (object) array(
     'type' => 'Text',
     'name' => 'secret',
     'comment' => 'not in Doctrine',
  ),
  4 =>
  (object) array(
     'type' => 'Text',
     'name' => 'provider',
     'comment' => 'not in Doctrine',
  ),
  5 =>
  (object) array(
     'type' => 'Text',
     'name' => 'redirect',
     'comment' => 'not in Doctrine',
  ),
  6 =>
  (object) array(
     'type' => 'Text',
     'name' => 'personal_access_client',
     'comment' => 'not in Doctrine',
  ),
  7 =>
  (object) array(
     'type' => 'Text',
     'name' => 'password_client',
     'comment' => 'not in Doctrine',
  ),
  8 =>
  (object) array(
     'type' => 'Text',
     'name' => 'revoked',
     'comment' => 'not in Doctrine',
  ),
);
    }

    /**
     * Get the tabs available.
     *
     * @return array
     */
    public function tabs():array {
        $tabs_name = [];

        return $tabs_name;
    }

    /**
     * Get the cards available for the request.
     *
     * @return array
     */
    public function cards(Request $request):array {
        return [];
    }

    /**
     * Get the filters available for the resource.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return array
     */
    public function filters(Request $request = null):array {
        return [];
    }

    /**
     * Get the lenses available for the resource.
     *
     * @return array
     */
    public function lenses(Request $request):array {
        return [];
    }

    /**
     * Get the actions available for the resource.
     *
     * @return array
     */
    public function actions():array {
        return [];
    }
}