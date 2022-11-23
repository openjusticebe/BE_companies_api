<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;

class ApiController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function index()
    {
        return redirect('api/v1/');
    }
}
