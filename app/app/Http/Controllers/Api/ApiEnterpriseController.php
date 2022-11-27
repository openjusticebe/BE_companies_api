<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Enterprise;
use App\Models\Denomination;

use App\Http\Resources\EnterpriseResource;
use App\Http\Resources\EnterpriseCondensedResource;

class ApiEnterpriseController extends Controller
{
    public function show($EnterpriseNumber)
    {
        $enterprise = Enterprise::where('EnterpriseNumber', $EnterpriseNumber)->with(
            ['addresses', 'denominations', 'contacts', 'establishments', 'activities', 'branches']
        )->first();

        # use a ressource to return the data
        return new EnterpriseResource($enterprise);
    }


    // get arguments from the url
    public function lookup(Request $request)
    {
        $enterprisesNumber = Denomination::where('Denomination', 'like', '%' . $request->input('name') . '%')->pluck('EntityNumber')->toArray();


        # filter with postal_code
        if ($request->input('Zipcode')) {
            $enterprises = Enterprise::whereIn('EnterpriseNumber', $enterprisesNumber)->with(
                ['addresses', 'denominations']
            )->whereHas('addresses', function ($query) use ($request) {
                $query->where('Zipcode', $request->input('Zipcode'));
            })->get();
        } else {
            $enterprises = Enterprise::whereIn('EnterpriseNumber', $enterprisesNumber)->with(
                ['addresses', 'denominations']
            )->get();
        }
        
        $enterprises->load('contacts', 'establishments', 'activities', 'branches');
        
        // return the data with the input
        return [
            'input' => $request->all(),
            'results' => $enterprises->count(),
            // using ressource
            'enterprises' => EnterpriseCondensedResource::collection($enterprises),
        ];
    }
}
