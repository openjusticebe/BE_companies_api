<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class BaseResource extends JsonResource
{
    public function toArray($request)
    {
    }

    public function with($request)
    {
        return
        [
            'meta' => [
                
                'api_version' => 'v1',
                'api_base' => route('api.index'),
                // api/documentation to base + api/documentation
                'api_documentation' => route('api.index') . '/documentation',
                'source_code' => env('SOURCE_CODE'),
                'author' => env('AUTHOR_NAME'),
                'disclaimer' => '⚠️ What you are seeing is raw technical data formatted in a non human readable way. It is not meant to be user-friendly.',
            ],
        ];
    }
}
