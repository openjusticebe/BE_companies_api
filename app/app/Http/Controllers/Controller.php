<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

/**
     * @OA\Info(
     *      version="1.0.0",
     *      title="BE Companies API Documentation",
     *      description="OpenApi description of the BE Companies API",
     *      @OA\Contact(
     *          email="martin@erpicum.net"
     *      ),
     *      @OA\License(
     *          name="GPL-3.0 License",
     *         url="https://www.gnu.org/licenses/gpl-3.0.en.html"
     *      )
     * )
     *
     * @OA\Server(
     *      url=L5_SWAGGER_CONST_HOST,
     *      description="BE Companies API Server"
     * s)   scheme="https",
     * )

     *
     * @OA\Tag(
     *     name="Projects",
     *     description="API Endpoints of Projects"
     * )
     */

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
}
