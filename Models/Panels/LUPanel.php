<?php

namespace Modules\LU\Models\Panels;

use Illuminate\Http\Request;
//--- Services --
use Modules\Xot\Models\Panels\XotBasePanel;
use Modules\Xot\Services\RouteService;

class LUPanel extends XotBasePanel {
    /**
     * The model the resource corresponds to.
     *
     * @var string
     */
    protected static $model = 'Modules\LU\Models\LU';

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
    protected static $search = [
];

    /**
     * The relationships that should be eager loaded on index queries.
     *
     * @var array
     */
    public static function with() {
        return [];
    }

    public function search() {
        return [];
    }

    /**
     * on select the option id.
     */
    public function optionId($row) {
        return $row->area_id;
    }

    /**
     * on select the option label.
     */
    public function optionLabel($row) {
        return $row->area_define_name;
    }

    /**
     * Get the fields displayed by the resource.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return array
        'col_bs_size' => 6,
        'sortable' => 1,
        'rules' => 'required',
        'rules_messages' => ['it'=>['required'=>'Nome Obbligatorio']],
        'value'=>'..',
     */
    public function indexNav() {
        return null;
    }

    /**
     * Build an "index" query for the given resource.
     *
     * @param Request                               $request
     * @param \Illuminate\Database\Eloquent\Builder $query
     *
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public static function indexQuery(Request $request, $query) {
        //return $query->where('auth_user_id', $request->user()->auth_user_id);
        return $query;
    }

    /**
     * Build a "relatable" query for the given resource.
     *
     * This query determines which instances of the model may be attached to other resources.
     *
     * @param Request                               $request
     * @param \Illuminate\Database\Eloquent\Builder $query
     *
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public static function relatableQuery(Request $request, $query) {
        //return $query->where('auth_user_id', $request->user()->auth_user_id);
         //return $query->where('user_id', $request->user()->id);
    }

    public static function fields() {
        return [
  0 => (object) ([
     'type' => 'Id',
     'name' => 'auth_user_id',
     'rules' => 'required',
     'comment' => null,
  ]),
  1 => (object) ([
     'type' => 'String',
     'name' => 'handle',
     'comment' => null,
  ]),
  2 => (object) ([
     'type' => 'String',
     'name' => 'passwd',
     'comment' => null,
  ]),
  3 => (object) ([
     'type' => 'DateTime',
     'name' => 'last_login_at',
     'comment' => null,
  ]),
  4 => (object) ([
     'type' => 'String',
     'name' => 'last_login_ip',
     'comment' => null,
  ]),
  5 => (object) ([
     'type' => 'Integer',
     'name' => 'owner_user_id',
     'comment' => null,
  ]),
  6 => (object) ([
     'type' => 'Integer',
     'name' => 'owner_group_id',
     'comment' => null,
  ]),
  7 => (object) ([
     'type' => 'String',
     'name' => 'is_active',
     'comment' => null,
  ]),
  8 => (object) ([
     'type' => 'String',
     'name' => 'email',
     'comment' => null,
  ]),
  9 => (object) ([
     'type' => 'Boolean',
     'name' => 'group_id',
     'comment' => null,
  ]),
  10 => (object) ([
     'type' => 'Boolean',
     'name' => 'banned_id',
     'comment' => null,
  ]),
  11 => (object) ([
     'type' => 'Boolean',
     'name' => 'country_id',
     'comment' => null,
  ]),
  12 => (object) ([
     'type' => 'Integer',
     'name' => 'question_id',
     'comment' => null,
  ]),
  13 => (object) ([
     'type' => 'String',
     'name' => 'nome',
     'comment' => null,
  ]),
  14 => (object) ([
     'type' => 'String',
     'name' => 'cognome',
     'comment' => null,
  ]),
  15 => (object) ([
     'type' => 'Integer',
     'name' => 'ente',
     'comment' => null,
  ]),
  16 => (object) ([
     'type' => 'Integer',
     'name' => 'matr',
     'comment' => null,
  ]),
  17 => (object) ([
     'type' => 'Integer',
     'name' => 'stabi',
     'comment' => null,
  ]),
  18 => (object) ([
     'type' => 'Integer',
     'name' => 'repar',
     'comment' => null,
  ]),
  19 => (object) ([
     'type' => 'String',
     'name' => 'password',
     'comment' => null,
  ]),
  20 => (object) ([
     'type' => 'String',
     'name' => 'hash',
     'comment' => null,
  ]),
  21 => (object) ([
     'type' => 'String',
     'name' => 'activation_code',
     'comment' => null,
  ]),
  22 => (object) ([
     'type' => 'String',
     'name' => 'forgotten_password_code',
     'comment' => null,
  ]),
  23 => (object) ([
     'type' => 'Date',
     'name' => 'birthday',
     'comment' => null,
  ]),
  24 => (object) ([
     'type' => 'Integer',
     'name' => 'last_birthday',
     'comment' => null,
  ]),
  25 => (object) ([
     'type' => 'Integer',
     'name' => 'dem_birthday',
     'comment' => null,
  ]),
  26 => (object) ([
     'type' => 'String',
     'name' => 'sesso',
     'comment' => null,
  ]),
  27 => (object) ([
     'type' => 'Boolean',
     'name' => 'giubbotto',
     'comment' => null,
  ]),
  28 => (object) ([
     'type' => 'String',
     'name' => 'provincia',
     'comment' => null,
  ]),
  29 => (object) ([
     'type' => 'String',
     'name' => 'conosciuto',
     'comment' => null,
  ]),
  30 => (object) ([
     'type' => 'String',
     'name' => 'news',
     'comment' => null,
  ]),
  31 => (object) ([
     'type' => 'String',
     'name' => 'citta',
     'comment' => null,
  ]),
  32 => (object) ([
     'type' => 'Boolean',
     'name' => 'segno',
     'comment' => null,
  ]),
  33 => (object) ([
     'type' => 'Boolean',
     'name' => 'hmail',
     'comment' => null,
  ]),
  34 => (object) ([
     'type' => 'Boolean',
     'name' => 'bounce',
     'comment' => null,
  ]),
  35 => (object) ([
     'type' => 'DateTime',
     'name' => 'dataIscrizione',
     'comment' => null,
  ]),
  36 => (object) ([
     'type' => 'Integer',
     'name' => 'dataCancellazione',
     'comment' => null,
  ]),
  37 => (object) ([
     'type' => 'DateTime',
     'name' => 'created_at',
     'comment' => null,
  ]),
  38 => (object) ([
     'type' => 'DateTime',
     'name' => 'updated_at',
     'comment' => null,
  ]),
  39 => (object) ([
     'type' => 'String',
     'name' => 'remember_token',
     'comment' => null,
  ]),
  40 => (object) ([
     'type' => 'String',
     'name' => 'updated_by',
     'comment' => null,
  ]),
  41 => (object) ([
     'type' => 'String',
     'name' => 'created_by',
     'comment' => null,
  ]),
  42 => (object) ([
     'type' => 'DateTime',
     'name' => 'email_verified_at',
     'comment' => null,
  ]),
  43 => (object) ([
     'type' => 'String',
     'name' => 'deleted_by',
     'comment' => null,
  ]),
  44 => (object) ([
     'type' => 'String',
     'name' => 'firstname',
     'comment' => null,
  ]),
  45 => (object) ([
     'type' => 'String',
     'name' => 'surname',
     'comment' => null,
  ]),
  46 => (object) ([
     'type' => 'String',
     'name' => 'token_check',
     'comment' => null,
  ]),
  47 => (object) ([
     'type' => 'Boolean',
     'name' => 'is_verified',
     'comment' => null,
  ]),
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
    public function actions(Request $request = null) {
        return [];
    }
}
