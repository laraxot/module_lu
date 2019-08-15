<?php
namespace Modules\LU\Transformers;

use Illuminate\Http\Resources\Json\Resource;

class AreaResource extends Resource{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request
     * @return array
     */
    public function toArray($request){
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
