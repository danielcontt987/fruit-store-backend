<?php

namespace App\Http\Controllers;

use App\Microservices\Client as ClientMS;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    public function list(Request $request) 
    {
        return response()->json(['status' => 200, 'clients' => ClientMS::list($request)]);
    }
}
