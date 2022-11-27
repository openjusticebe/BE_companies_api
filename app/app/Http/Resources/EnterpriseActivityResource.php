<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class EnterpriseActivityResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'activity' => $this->Classification,
            'NaceCode' => $this->NaceCode,
            'NaceVersion' => $this->NaceVersion,
            'labels' => $this->naceLabels,
        ];
    }
}
