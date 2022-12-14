<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Api\BaseController;
use Illuminate\Http\Request;

use App\Models\Code;

class ApiCodeController extends BaseController
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function show($category, $code, $language)
    {
        # get the code
        $code = Code::where('Category', $category)->where('Code', $code)->where('Language', $language)->firstOrFail();

        # return the data
        return $code;
    }
}
