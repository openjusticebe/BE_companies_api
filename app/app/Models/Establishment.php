<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Establishment extends Model
{
    use HasFactory;

    protected $table = 'establishment';

    // define the variables and their types
    protected $casts = [
        'EstablishmentNumber' => 'string',
        'EnterpriseNumber' => 'string',
        'StartDate' => 'date',
    ];

    public function enterprise()
    {
        return $this->belongsTo(Enterprise::class, 'EnterpriseNumber', 'EnterpriseNumber');
    }
}
