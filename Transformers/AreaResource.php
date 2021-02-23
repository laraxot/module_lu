<<<<<<< HEAD
<?php

namespace Modules\LU\Transformers;

//use Illuminate\Http\Resources\Json\JsonResource as Resource;
//use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * Class AreaResource
 * @package Modules\LU\Transformers
 */
class AreaResource extends JsonResource {
    /**
     * Transform the resource into an array.
     *
     * @param \Illuminate\Http\Request $request
     * @return array
     */
    public function toArray($request) {
        return parent::toArray($request);
        /*
        return [
            'id' => $this->id,
            'ente' => $this->ente,
            'matr' => $this->matr,
        ];
        */
    }
}
=======
<?php

declare(strict_types=1);

namespace Modules\LU\Transformers;

//use Illuminate\Http\Resources\Json\JsonResource as Resource;
//use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * Class AreaResource.
 */
class AreaResource extends JsonResource {
    /**
     * Transform the resource into an array.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return array
     */
    public function toArray($request) {
        return parent::toArray($request);
        /*
        return [
            'id' => $this->id,
            'ente' => $this->ente,
            'matr' => $this->matr,
        ];
        */
    }
}
>>>>>>> 3c191b8b6e72c4241b48547e7460883dfd14b26c
