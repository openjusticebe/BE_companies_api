<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Enterprise extends Model
{
    use HasFactory;

    protected $table = 'enterprise';

    // protected $primaryKey = 'EnterpriseNumber';

    // define the variables and their types
    protected $casts = [
        'EnterpriseNumber' => 'string',
        'Status' => 'string',
        'JuridicalSituation' => 'integer',
        'TypeOfEnterprise' => 'integer',
        'JuridicalForm' => 'integer',
        'JuridicalFormCAC' => 'integer',
        'StartDate' => 'date',
    ];

    public function TypeOfEnterpriseLabel()
    {
        return $this->hasMany('App\Models\Code', 'Code', 'TypeOfEnterprise')->where('Category', 'TypeOfEnterprise')->select(['Language','Description']);
    }

    public function JuridicalSituationLabel()
    {
        return $this->hasMany('App\Models\Code', 'Code', 'JuridicalSituation')->where('Category', 'JuridicalSituation')->select(['Language','Description']);
    }

    public function JuridicalFormLabel()
    {
        return $this->hasMany('App\Models\Code', 'Code', 'JuridicalForm')->where('Category', 'JuridicalForm')->select(['Language','Description']);
    }


    public function JuridicalFormCACLabel()
    {
        return $this->hasMany('App\Models\Code', 'Code', 'JuridicalFormCAC')->where('Category', 'JuridicalForm')->select(['Language','Description']);
    }
    
    
    # hasMany Address
    public function addresses()
    {
        return $this->hasMany(Address::class, 'EntityNumber', 'EnterpriseNumber');
    }
    # hasMany denominations
    
    public function denominations()
    {
        return $this->hasMany(Denomination::class, 'EntityNumber', 'EnterpriseNumber');
    }

    # hasMany denominations
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
    public function activites()
    {
        return $this->hasMany(Activity::class, 'EntityNumber', 'EnterpriseNumber');
    }

    ## EnterpriseNumber without the dot
    public function getEnterpriseNumberDotLessAttribute()
    {
        return str_replace('.', '', $this->EnterpriseNumber);
    }

    # external links
    public function getExternalLinksAttribute()
    {
        return [
            'notaire' => [
                'attributes' => 'notaire',
                'href' =>  ' https://statuts.notaire.be/stapor_v1/enterprise/' . $this->EnterpriseNumberDotLess . '/statutes',
            ],
            'nbb' => [
                'attributes' => 'nbb',
                'href' =>  'https://consult.cbso.nbb.be/consult-enterprise/' . $this->EnterpriseNumberDotLess,
            ],
            'ejustice' => [
                'attributes' => 'ejustice',
                'href' =>  'http://www.ejustice.just.fgov.be/cgi_tsv/tsv_rech.pl?language=fr&btw=' . $this->EnterpriseNumberDotLess . '&liste=Liste',
            ],


        ];
    }
}
