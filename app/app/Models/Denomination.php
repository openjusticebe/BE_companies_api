<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Denomination extends Model
{
    use HasFactory;

    protected $table = 'denomination';

    // denomination
    // EntityNumber, Language, TypeOfDenomination, Denomination

    // define the variables and their types
    protected $casts = [
        'EntityNumber' => 'string',
        'Language' => 'string',
        'TypeOfDenomination' => 'integer',
        'Denomination' => 'string',
    ];

    # belongsTo Enterprise
    public function enterprise()
    {
        return $this->belongsTo(Enterprise::class, 'EntityNumber', 'EnterpriseNumber');
    }
}
