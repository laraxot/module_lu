<?php

declare(strict_types=1);

namespace Modules\LU\Models\Panels;

use Illuminate\Http\Request;
use Modules\Cms\Models\Panels\XotBasePanel;
// --- Services --

use Modules\LU\Models\ModelHasPermission;
use Modules\Xot\Contracts\RowsContract;

class ModelHasPermissionPanel extends XotBasePanel
{
    /**
     * The model the resource corresponds to.
     */
    public static string $model = 'ModelHasPermission';

    /**
     * The single value that should be used to represent the resource when being displayed.
     */
    public static string $title = 'title';

    /**
     * The columns that should be searched.
     *
     * @var array
     */
    public static $search = [
    ];

    /**
     * The relationships that should be eager loaded on index queries.
     */
    public function with(): array
    {
        return [];
    }

    public function search(): array
    {
        return [];
    }

    /**
     * on select the option label.
     *
     * @param ModelHasPermission $row
     */
    public function optionLabel($row): string
    {
        return (string) $row->permission_id.'  '.$row->model_type.' - '.$row->model_id;
    }

    /**
     * index navigation.
     */
    public function indexNav(): ?\Illuminate\Contracts\Support\Renderable
    {
        return null;
    }

    /**
     * Build an "index" query for the given resource.
     *
     * @param RowsContract $query
     *
     * @return RowsContract
     */
    public function indexQuery(array $data, $query)
    {
        // return $query->where('user_id', $request->user()->id);
        return $query;
    }

    /**
     * Get the fields displayed by the resource.
        'value'=>'..',
     */
    public function fields(): array
    {
        return [
            (object) [
                'type' => 'Text',
                'name' => 'permission_id',
                'comment' => 'not in Doctrine',
            ],

            (object) [
                'type' => 'Text',
                'name' => 'model_type',
                'comment' => 'not in Doctrine',
            ],

            (object) [
                'type' => 'Text',
                'name' => 'model_id',
                'comment' => 'not in Doctrine',
            ],
        ];
    }

    /**
     * Get the tabs available.
     */
    public function tabs(): array
    {
        $tabs_name = [];

        return $tabs_name;
    }

    /**
     * Get the cards available for the request.
     */
    public function cards(Request $request): array
    {
        return [];
    }

    /**
     * Get the filters available for the resource.
     *
     * @param \Illuminate\Http\Request $request
     */
    public function filters(Request $request = null): array
    {
        return [];
    }

    /**
     * Get the lenses available for the resource.
     */
    public function lenses(Request $request): array
    {
        return [];
    }

    /**
     * Get the actions available for the resource.
     */
    public function actions(): array
    {
        return [];
    }
}
