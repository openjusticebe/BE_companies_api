<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Branch extends Model
{
    use HasFactory;

    protected $table = 'branch';

    // belongsTo Entreprise
    public function entreprise()
    {
        return $this->belongsTo(Entreprise::class, 'EnterpriseNumber', 'EnterpriseNumber');
    }
}

// branch
// Id, StartDate, EnterpriseNumber
