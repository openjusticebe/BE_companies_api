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
            'EnterpriseNumberDotLess' => $this->EnterpriseNumberDotLess,
            
            'Denominations' => $this->denominations,

            'Addresses' => $this->addresses,

            'Contacts' => $this->contacts,

            'Establishments' => $this->establishments,
            
            // load activities through new resource
            'Activities' => EnterpriseActivityResource::collection($this->activities),

            'Branches' => $this->branches,

            'Status' => $this->Status,
            'StatusLabel' => $this->StatusLabel,
            
            'JuridicalSituation' => $this->JuridicalSituation,
            'JuridicalSituationLabel' => $this->JuridicalSituationLabel,

            'TypeOfEnterprise' => $this->TypeOfEnterprise,
            'TypeOfEnterpriseLabel' => $this->TypeOfEnterpriseLabel,

            'JuridicalForm' =>  $this->JuridicalForm,
            'JuridicalFormLabel' => $this->JuridicalFormLabel,

            'JuridicalFormCAC' =>  $this->JuridicalFormCAC,
            'JuridicalFormCACLabel' => $this->JuridicalFormCACLabel,


            'StartDate' => $this->StartDate,

            'ExternalLinks' => $this->ExternalLinks,
        ];

        // return 'test' = $this->EnterpriseNumber;
    }
}
