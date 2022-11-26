<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

use URL;

class HomePageResource extends BaseResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'title' => env('APP_NAME'),
      
            'navigation_menu' => [
                [
                    'title' => 'self',
                    'emoji' => '🏠',
                    'href' => URL::current(),
                ],
                [
                    'title' => 'custom_methods',
                    'examples' => [
                        'mesylab' => route('enterprises.show', ['0685.595.109']),
                        'oj' => route('enterprises.show', ['0749.460.404']),
                        'mfwb' => route('enterprises.show', ['0316.380.940']),
                        'montpiete' => route('enterprises.show', ['0862.932.685']),
                        'naces' => route('naces.get', ['70111,70112']),
                        'lookup' => route('enterprises.lookup', ['name' => 'mesylab', 'Zipcode' => '4140']),

                    //    'logbook' => route('api.logbook.logbook'),
                    //    'map' => route('api.map.map'),
                    //    'indicators' => route('api.indicators.index'),
                    ]
                ]
            ],
        ];
    }
}
