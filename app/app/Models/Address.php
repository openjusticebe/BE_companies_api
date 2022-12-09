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
        $houseN_box = $this->HouseNumber . (!is_null($this->Box) ? '/' . $this->Box : '');

        return trim($this->StreetFR . ' ' . $houseN_box . ', ' . $this->Zipcode . ' ' . $this->MunicipalityFR . ' ' . $this->ExtraAddressInfo);
    }

    public function getOpenStreetMapLinkAttribute()
    {
        return 'https://www.openstreetmap.org/search?query=' . urlencode($this->short);
    }
}
