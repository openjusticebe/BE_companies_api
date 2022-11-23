<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    use HasFactory;

    protected $table = 'address';
}


// address
// EntityNumber, TypeOfAddress, CountryNL, CountryFR, Zipcode, MunicipalityNL, MunicipalityFR, StreetNL, StreetFR, HouseNumber, Box, ExtraAddressInfo, DateStrikingOff
