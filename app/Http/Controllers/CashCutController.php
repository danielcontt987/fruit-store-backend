<?php

namespace App\Http\Controllers;

use App\Microservices\CashCut as CashCutMS;
use Illuminate\Http\Request;

class CashCutController extends Controller
{
    public function list(Request $request)
    {
        return response()->json(['cashcuts' => CashCutMS::list($request)]);
    }

    public function get(Request $request)
    {
        return response()->json(['cashcut' => CashCutMS::get($request)]);
    }

    public function store(Request $request)
    {
        return response()->json(['status' => 200,'cashcut' => CashCutMS::store($request)]);
    }
}
