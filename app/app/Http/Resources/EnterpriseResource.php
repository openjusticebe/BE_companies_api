<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class EnterpriseResource extends BaseResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        // return $this;
  
        return [
            'EnterpriseNumber' => $this->EnterpriseNumber,
            'Status' => $this->Status,
            'JuridicalSituation' => $this->JuridicalSituation,
            'TypeOfEnterprise' => $this->TypeOfEnterprise,
            'JuridicalForm' =>  $this->JuridicalForm,
            'JuridicalFormCAC' =>  $this->JuridicalFormCAC,
            'StartDate' => $this->StartDate
        ];

        // return 'test' = $this->EnterpriseNumber;
    }
}
