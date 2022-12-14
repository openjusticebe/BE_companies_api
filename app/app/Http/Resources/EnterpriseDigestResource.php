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
            'denomination' => $this->denominations->pluck('Denomination')->implode(' ; '),
            'addresses' => $this->addresses->pluck('short')->implode(' ; '),
            'NACE2008_main'
                => $this->activities->where('Classification', "MAIN")
                ->where('NaceVersion', '2008')
                ->pluck('NaceCode')->implode(', '),

            'NACE2008_seco'
                => $this->activities->where('Classification', "SECO")
                ->where('NaceVersion', '2008')
                ->pluck('NaceCode')->implode(', '),
            'NACE2003_main'
                => $this->activities->where('Classification', "MAIN")
                ->where('NaceVersion', '2003')
                ->pluck('NaceCode')->implode(', '),

            'NACE2003_seco'
                => $this->activities->where('Classification', "SECO")
                ->where('NaceVersion', '2003')
                ->pluck('NaceCode')->implode(', '),

            'establishments' => $this->establishments->pluck('EstablishmentNumber')->implode(' ; '),

            'branches' => $this->branches->pluck(['Id'])->implode(' ; '),
            
            'contacts' => $this->contacts->pluck('Value')->implode(', '),
            'status' => $this->StatusLabel->pluck('Description')->implode(', '),

            'type_entreprise_fr' => $this->TypeOfEnterpriseLabel->where('Language', 'FR')->pluck('Description')->implode(', '),
            'type_entreprise_nl' => $this->TypeOfEnterpriseLabel->where('Language', 'NL')->pluck('Description')->implode(', '),

            'juridical_situation_fr' => $this->JuridicalSituationLabel->where('Language', 'FR')->pluck('Description')->implode(', '),
            'juridical_situation_nl' => $this->JuridicalSituationLabel->where('Language', 'NL')->pluck('Description')->implode(', '),

            'juridical_form_fr' => $this->JuridicalFormLabel->where('Language', 'FR')->pluck('Description')->implode(', '),
            'juridical_form_nl' => $this->JuridicalFormLabel->where('Language', 'NL')->pluck('Description')->implode(', '),
            
            'juridical_form_cac_fr' => $this->JuridicalFormCACLabel->where('Language', 'FR')->pluck('Description')->implode(', '),
            'juridical_form_cac_nl' => $this->JuridicalFormCACLabel->where('Language', 'NL')->pluck('Description')->implode(', '),
            
            'StartDate' => $this->StartDate,
            'links' => [
                'self' => route('enterprises.showDigest', [$this->EnterpriseNumber]),
                'exhaustive_info' => route('enterprises.show', [$this->EnterpriseNumber]),
            ],
            // 'Denominations' => $this->denominations,

            // 'Addresses' => $this->addresses,

            // 'Contacts' => $this->contacts,

            // 'Establishments' => $this->establishments,

            // 'Activites' => $this->activites,

            //

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
