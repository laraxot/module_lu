<?php

declare(strict_types=1);

namespace Modules\LU\Models\Panels;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
// --- Services --
use Modules\LU\Models\Area;
use Modules\Cms\Models\Panels\XotBasePanel;

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
        return []; // ['area_id','area_define_name'];
    }

    /**
     * Undocumented function.
     *
     * @param Area $row
     */
    public function optionLabel($row): string {
        return (string) $row->area_define_name;
    }

    /**
     * on select the option id.
     *
     * quando aggiungi un campo select, è il numero della chiave
     * che viene messo come valore su value="id"
     *
     * @return int|mixed
     */
    public function optionId(Model $row) {
        return $row->getKey();
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
                'name' => 'id',
            ],
            (object) [
                'type' => 'String',
                'name' => 'area_define_name',
                'rules' => 'required',
            ],
        ];
    }

    /**
     * Get the tabs available.
     */
    public function tabs(): array {
        $tabs_name = ['users' /* , 'perm' */];

        return $tabs_name;
    }

    /**
     * Get the cards available for the request.
     */
    public function cards(Request $request): array {
        return [];
    }

    /**
     * Get the filters available for the resource.
     */
    public function filters(Request $request = null): array {
        return [];
    }

    /**
     * Get the lenses available for the resource.
     */
    public function lenses(Request $request): array {
        return [];
    }

    /**
     * Get the actions available for the resource.
     */
    public function actions(): array {
        return [
            new Actions\SyncAreas(),
            new Actions\TestUsersWithLivewireAction(),
        ];
    }

    /* deprecated ??
    public function bodyContentView(array $params = []) {
        //dddx($params);
        extract($params);
        //$route_params = optional(\Route::current())->parameters();
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
