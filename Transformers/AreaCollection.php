<?php

namespace Modules\LU\Transformers;

use Illuminate\Http\Resources\Json\ResourceCollection;

class AreaCollection extends ResourceCollection {
    /**
     * The resource that this resource collects.
     *
     * @var string
     */
    public $collects = 'Modules\LU\Transformers\AreaResource';

    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request
     *
     * @return array
     */
    public function toArray($request) {
        //return parent::toArray($request);
        return [
            'data' => $this->collection,
            'links' => [
                'self' => 'link-value',
            ],
        ];
    }
}
