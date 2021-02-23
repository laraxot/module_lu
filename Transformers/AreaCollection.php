<<<<<<< HEAD
<?php

declare(strict_types=1);

namespace Modules\LU\Transformers;

//use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;

/**
 * Class AreaCollection.
 */
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
     * @param \Illuminate\Http\Request $request
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
=======
<?php

declare(strict_types=1);

namespace Modules\LU\Transformers;

//use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;

/**
 * Class AreaCollection.
 */
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
     * @param \Illuminate\Http\Request $request
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
>>>>>>> 3c191b8b6e72c4241b48547e7460883dfd14b26c
