<?php

namespace App\Http\Controllers;

use App\Microservices\Inventory as InventoryMS;
use Illuminate\Http\Request;

class InventoryController extends Controller
{
    public function list(Request $request)
    {
        return response()->json(['inventories' => InventoryMS::list($request)], 200);
    }
}
