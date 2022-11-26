<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Enterprise;
use App\Models\Denomination;

use App\Http\Resources\EnterpriseResource;

class ApiEnterpriseController extends Controller
{
    public function show($EnterpriseNumber)
    {
        $enterprise = Enterprise::where('EnterpriseNumber', $EnterpriseNumber)->with(
            ['addresses', 'denominations', 'contacts', 'establishments', 'activites', 'branches']
        )->first();

        # use a ressource to return the data
        return new EnterpriseResource($enterprise);
    }


    // get arguments from the url
    public function lookup(Request $request)
    {
        $enterprisesNumber = Denomination::where('Denomination', 'like', '%' . $request->input('name') . '%')->pluck('EntityNumber')->toArray();

        $enterprises = Enterprise::whereIn('EnterpriseNumber', $enterprisesNumber)->with(
            ['addresses', 'denominations', 'contacts', 'establishments', 'activites', 'branches']
        )->get();

        # filter with postal_code
        if ($request->input('Zipcode')) {
            $enterprises = $enterprises->filter(function ($enterprise) use ($request) {
                return $enterprise->addresses->filter(function ($address) use ($request) {
                    return $address->Zipcode == $request->input('Zipcode');
                })->count() > 0;
            });
        }
        
        
        return $enterprises;
    }
}
