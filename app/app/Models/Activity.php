<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Activity extends Model
{
    use HasFactory;

    protected $table = 'activity';

    // belongsTo Entreprise
    public function entreprise()
    {
        return $this->belongsTo(Entreprise::class, 'EnterpriseNumber', 'EntityNumber');
    }
}


// activity
// EntityNumber, ActivityGroup, NaceVersion, NaceCode, Classification
