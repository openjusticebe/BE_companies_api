<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Enterprise;
use App\Models\Denomination;

use App\Http\Resources\EnterpriseResource;
use App\Http\Resources\EnterpriseDigestResource;

use Helper;

class ApiEnterpriseController extends Controller
{
    public function show($EnterpriseNumberRequest)
    {
        $EnterpriseNumber = Helper::fixEnterpriseNumber($EnterpriseNumberRequest);
        
        $enterprise = Enterprise::where('EnterpriseNumber', $EnterpriseNumber)->with(
            ['addresses', 'denominations', 'contacts', 'establishments', 'activities', 'branches']
        )->firstOrFail();

        $enterprise->EnterpriseNumberRequest = $EnterpriseNumberRequest;

        return new EnterpriseResource($enterprise);
    }

    public function showDigest($EnterpriseNumberRequest)
    {
        $EnterpriseNumber = Helper::fixEnterpriseNumber($EnterpriseNumberRequest);

        $enterprise = Enterprise::where('EnterpriseNumber', $EnterpriseNumber)->with(
            ['addresses', 'denominations', 'contacts', 'establishments', 'activities', 'branches']
        )->firstOrFail();

        $enterprise->EnterpriseNumberRequest = $EnterpriseNumberRequest;

        return new EnterpriseDigestResource($enterprise);
    }

    // get arguments from the url
    public function lookup(Request $request)
    {
        $enterprisesNumber = Denomination::where('Denomination', 'like', '%' . $request->input('name') . '%')->pluck('EntityNumber')->toArray();

        # filter with Zipcode
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
            'enterprises' => EnterpriseDigestResource::collection($enterprises),
        ];
    }

    public function random()
    {
        # find a random enterprise
        $enterprise = Enterprise::inRandomOrder()->first();

        return new EnterpriseDigestResource($enterprise);
    }
}
