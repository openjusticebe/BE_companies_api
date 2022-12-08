<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class EnterpriseDigestResource extends BaseResource
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

            # Denominations as comma separated string
            'denomination' => $this->denominations->pluck('Denomination')->implode(', '),
            'addresses' => $this->addresses->pluck('short')->implode(' ; '),
            'main_naces'
                => $this->activities->where('Classification', "MAIN")->pluck('NaceCode')->implode(', '),

            'seco_naces'
                => $this->activities->where('Classification', "SECO")->pluck('NaceCode')->implode(', '),

             'establishments' => $this->establishments->pluck('EstablishmentNumber')->implode(', '),
             'contacts' => $this->contacts->pluck('Value')->implode(', '),
             'status' => $this->StatusLabel->pluck('Description')->implode(', '),
             'TypeOfEnterpriseLabel' => $this->TypeOfEnterpriseLabel->pluck('Description')->implode(', '),
             'JuridicalSituationLabel' => $this->JuridicalSituationLabel->pluck('Description')->implode(', '),
             'JuridicalFormCACLabel' => $this->JuridicalFormCACLabel->pluck('Description')->implode(', '),
             'StartDate' => $this->StartDate,
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
