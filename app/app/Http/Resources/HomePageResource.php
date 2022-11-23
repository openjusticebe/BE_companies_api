<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

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
                    // 'href' => URL::current(),
                ],
                [
                    'title' => 'custom_methods',
                    'emoji' => '🛶',
                    'methods' => [
                    //    'logbook' => route('api.logbook.logbook'),
                    //    'map' => route('api.map.map'),
                    //    'indicators' => route('api.indicators.index'),
                    ]
                ]
            ],
    }
}

