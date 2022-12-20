<?php

declare(strict_types=1);

namespace Modules\LU\Models\Panels;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
// --- Services --
use Modules\LU\Models\Group;
use Modules\Cms\Models\Panels\XotBasePanel;

/**
 * Class GroupPanel.
 */
class GroupPanel extends XotBasePanel {
    /**
     * The model the resource corresponds to.
     */
    protected static string $model = 'Modules\LU\Models\Group';

    /**
     * The single value that should be used to represent the resource when being displayed.
     */
    protected static string $title = 'title';

    /**
     * The columns that should be searched.
     */
    protected static array $search = [];

    /**
     * Undocumented function.
     *
     * @param Group $row
     */
    public function optionLabel($row): string {
        // dddx($row instanceof Group);//true !!!

        return $row->getKey().'] '.$row->getAttributeValue('group_define_name');
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
                'name' => 'group_define_name',
            ],
            (object) [
                'type' => 'Integer',
                'name' => 'group_type',
            ],
            (object) [
                'type' => 'Integer',
                'name' => 'owner_user_id',
            ],
            (object) [
                'type' => 'Integer',
                'name' => 'owner_group_id',
            ],
            (object) [
                'type' => 'String',
                'name' => 'is_active',
            ],
        ];
    }

    /**
     * Get the tabs available.
     */
    public function tabs(): array {
        $tabs_name = [];

        return [];
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
        return [];
    }

    /* deprecated
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
