<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Establishment extends Model
{
    use HasFactory;


    protected $table = 'establishment';

    // establishment
    // EstablishmentNumber, StartDate, EnterpriseNumber

    // define the variables and their types
    protected $casts = [
        'EstablishmentNumber' => 'string',
        'EnterpriseNumber' => 'string',
        'StartDate' => 'date',
    ];


    # belongsTo Enterprise
    public function enterprise()
    {
        return $this->belongsTo(Enterprise::class, 'EnterpriseNumber', 'EnterpriseNumber');
    }
}
