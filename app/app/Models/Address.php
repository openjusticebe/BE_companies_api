<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    use HasFactory;

    protected $table = 'address';

    # short address
    public function getShortAttribute()
    {
        return trim($this->StreetFR . ' ' . $this->HouseNumber . ' ' .  $this->Box . ', ' . $this->Zipcode . ' ' . $this->MunicipalityFR . ' ' . $this->ExtraAddressInfo . ' ');
    }
}
