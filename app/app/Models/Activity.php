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

    public function establishment()
    {
        return $this->belongsTo(Establishment::class, 'EstablishmentNumber', 'EntityNumber');
    }

    public function naceLabels()
    {
        return $this->hasMany(Code::class, 'Code', 'NaceCode')
        ->where('Category', 'Nace' . $this->NaceVersion);
    }
}


// activity
// EntityNumber, ActivityGroup, NaceVersion, NaceCode, Classification
