<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class EnterpriseCondensedResource extends BaseResource
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
            'EnterpriseNumber' => $this->EnterpriseNumber,

            'Denominations' => $this->denominations->pluck('Denomination'),
            'addresses' => $this->addresses,
            'links' => [
                'self' => route('enterprises.show', [$this->EnterpriseNumber]),
            ],
            // 'Denominations' => $this->denominations,

            // 'Addresses' => $this->addresses,

            // 'Contacts' => $this->contacts,

            // 'Establishments' => $this->establishments,

            // 'Activites' => $this->activites,

            // 'Branches' => $this->branches,

            // 'Status' => $this->Status,
            // 'StatusLabel' => $this->StatusLabel,
            
            // 'JuridicalSituation' => $this->JuridicalSituation,
            // 'JuridicalSituationLabel' => $this->JuridicalSituationLabel,

            // 'TypeOfEnterprise' => $this->TypeOfEnterprise,
            // 'TypeOfEnterpriseLabel' => $this->TypeOfEnterpriseLabel,

            // 'JuridicalForm' =>  $this->JuridicalForm,
            // 'JuridicalFormLabel' => $this->JuridicalFormLabel,

            // 'JuridicalFormCAC' =>  $this->JuridicalFormCAC,
            // 'JuridicalFormCACLabel' => $this->JuridicalFormCACLabel,


            // 'StartDate' => $this->StartDate,

            // 'ExternalLinks' => $this->ExternalLinks,
        ];

        // return 'test' = $this->EnterpriseNumber;
    }
}
