<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Denomination extends Model
{
    use HasFactory;

    protected $table = 'denomination';


    protected $casts = [
        'EntityNumber' => 'string',
        'Language' => 'string',
        'TypeOfDenomination' => 'integer',
        'Denomination' => 'string',
    ];

    public function enterprise()
    {
        return $this->belongsTo(Enterprise::class, 'EntityNumber', 'EnterpriseNumber');
    }
}
