<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Api\BaseController;
use Illuminate\Http\Request;

use App\Models\Enterprise;
use App\Models\Activity;
use App\Models\Establishment;
use App\Models\Code;

class ApiNaceController extends BaseController
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function get($naceArray)
    {
        # convert the string to an array
        $naceArray = explode(',', $naceArray);

        # get the naces
        $naces = Activity::whereIn('NaceCode', $naceArray)->get();

        # return naces->EntityNumber to array
        $entities = $naces->pluck('EntityNumber')->toArray();
       
        # get the enterprises
        $enterprises = Enterprise::whereIn('EnterpriseNumber', $entities)->with(
            ['addresses', 'denominations', 'contacts', 'establishments', 'activities', 'branches']
        )->get();

        $establishments = Establishment::whereIn('EstablishmentNumber', $entities)->with(
            ['enterprise']
        )->get();

        # return the data
        return [
            'naces' => $naces,
            'enterprises' => $enterprises,
            'establishments' => $establishments,
        ];
    }
}
