<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use App\Models\Enterprise;
use App\Http\Resources\EnterpriseResource;

class ApiEnterpriseController extends Controller
{
    public function show($EnterpriseNumber)
    {
        // OpenJustice
        // http://127.0.0.1:8001/api/companies/find/0749.460.404

        // Mesylab
        // http://127.0.0.1:8001/api/companies/find/0685.595.109

        $enterprise = Enterprise::where('EnterpriseNumber', $EnterpriseNumber)->with(
            ['addresses', 'denominations', 'contacts', 'establishments', 'activites', 'branches']
        )->first();


        # use a ressource to return the data
        return new EnterpriseResource($enterprise);
    }
}
