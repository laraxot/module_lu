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
>>>>>>> ae14cf9 (first)
