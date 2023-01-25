<?php

declare(strict_types=1);

namespace Modules\LU\Transformers;

// use Illuminate\Http\Resources\Json\JsonResource as Resource;
// use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use JsonSerializable;

/**
 * Class AreaResource.
 */
class AreaResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return array|\Illuminate\Contracts\Support\Arrayable|JsonSerializable
     */
    public function toArray($request)
    {
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
