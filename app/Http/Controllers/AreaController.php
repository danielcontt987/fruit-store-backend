<?php

namespace App\Http\Controllers;

use App\Microservices\Area as AreaMS;
use Illuminate\Http\Request;

class AreaController extends Controller
{
    public function list(Request $request)
    {
        return response()->json(["areas" => AreaMS::list($request), "status" =>200]);
    }
}
