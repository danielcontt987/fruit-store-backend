<?php

namespace App\Microservices;

use App\Models\Inventory as ModelsInventory;

class Inventory extends Microservice
{
    public static function list($request)
    {
        $inventories = ModelsInventory::where('area_id', $request->area_id)->get();
        return $inventories;
    }
}
