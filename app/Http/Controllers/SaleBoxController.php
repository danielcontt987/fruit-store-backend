<?php

namespace App\Http\Controllers;

use App\Microservices\SaleBox as SaleBoxMS;
use Illuminate\Http\Request;

class SaleBoxController extends Controller
{
    public function list(Request $request)
    {
        return response()->json(['saleboxes' => SaleBoxMS::list($request)]);
    }

    public function store(Request $request)
    {
        return response()->json(['status' => 200,'salebox' => SaleBoxMS::store($request)]);
    }
}
