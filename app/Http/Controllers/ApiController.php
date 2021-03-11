<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class ApiController extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    /**
     * Finds or creates a Salary file. For testing purposes only
     * @return array
     */
    public function test():array {
        $result = [
            'success'   => false,
            'data'      => []
        ];
        //Get the date parameter from the request
        $request = \Request::all();

        return $result;
    }
}
