<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Enterprise extends Model
{
    use HasFactory;

    protected $table = 'enterprise';

    // define the variables and their types
    protected $casts = [
        'EnterpriseNumber' => 'string',
        'Status' => 'string',
        'JuridicalSituation' => 'string',
        'TypeOfEnterprise' => 'string',
        'JuridicalForm' => 'string',
        'JuridicalFormCAC' => 'string',
        'StartDate' => 'date',
    ];

    public function StatusLabel()
    {
        return $this->hasMany(Code::class, 'Code', 'Status')
        ->where('Category', 'Status')
        ->orderBy('Code');
    }

    public function TypeOfEnterpriseLabel()
    {
        return $this->hasMany(Code::class, 'Code', 'TypeOfEnterprise')
        ->where('Category', 'TypeOfEnterprise')
        ->select(['Language','Description']);
    }

    public function JuridicalSituationLabel()
    {
        return $this->hasMany(Code::class, 'Code', 'JuridicalSituation')
        ->where('Category', 'JuridicalSituation')
        ->select(['Language','Description']);
    }

    public function JuridicalFormLabel()
    {
        return $this->hasMany(Code::class, 'Code', 'JuridicalForm')
        ->where('Category', 'JuridicalForm')
        ->select(['Language','Description']);
    }

    public function JuridicalFormCACLabel()
    {
        return $this->hasMany(Code::class, 'Code', 'JuridicalForm')
        ->where('Category', 'JuridicalForm')
        ->select(['Language','Description']);
    }
    
    public function denominations()
    {
        return $this->hasMany(Denomination::class, 'EntityNumber', 'EnterpriseNumber');
    }

    public function addresses()
    {
        return $this->hasMany(Address::class, 'EntityNumber', 'EnterpriseNumber');
    }

    public function contacts()
    {
        return $this->hasMany(Contact::class, 'EntityNumber', 'EnterpriseNumber');
    }

    public function establishments()
    {
        return $this->hasMany(Establishment::class, 'EnterpriseNumber', 'EnterpriseNumber');
    }

    public function branches()
    {
        return $this->hasMany(Branch::class, 'EnterpriseNumber', 'EnterpriseNumber');
    }

    // activity
    public function activities()
    {
        return $this->hasMany(Activity::class, 'EntityNumber', 'EnterpriseNumber')
        ->orderBy('Classification');
    }


    ## EnterpriseNumber without the dot
    public function getEnterpriseNumberDotLessAttribute()
    {
        return str_replace('.', '', $this->EnterpriseNumber);
    }

    ## EnterpriseNumber starting with 'BE'
    public function getEnterpriseNumberBEAttribute()
    {
        return 'BE ' . $this->EnterpriseNumber;
    }
    
    # external links
    public function getExternalLinksAttribute()
    {
        return [
            'notaire' => [
                'service_name' => 'Statuts et pouvoirs de représentation',
                'href' =>  'https://statuts.notaire.be/stapor_v1/enterprise/' . $this->EnterpriseNumberDotLess . '/statutes',
            ],
            'nbb' => [
                'service_name' => 'Central Balance Sheet Office',
                'href' =>  'https://consult.cbso.nbb.be/consult-enterprise/' . $this->EnterpriseNumberDotLess,
            ],
            'ejustice' => [
                'service_name' => 'ejustice',
                'href' =>  'http://www.ejustice.just.fgov.be/cgi_tsv/tsv_rech.pl?language=fr&btw=' . $this->EnterpriseNumberDotLess . '&liste=Liste',
            ],
            'bce' => [
                'service_name' => 'Banque-Carrefour des Entreprises',
                'href' =>  'https://kbopub.economie.fgov.be/kbopub/toonondernemingps.html?lang=fr&ondernemingsnummer=' . $this->EnterpriseNumberDotLess,
            ],
            'address' => [
                'service_name' => 'Address',
                'href' =>  'https://www.openstreetmap.org/search?query=' . urlencode($this->addresses->first()->short),
            ],

        ];
    }
}
