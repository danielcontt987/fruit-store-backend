<?php

namespace App\Microservices;

use App\Models\Area as ModelsArea;

class Area extends Microservice
{
    public static function list($request)
    {
        $areas = ModelsArea::where('user_id', $request->user_id)
        ->where('business_id', $request->business_id)->get();
        return $areas;
    }
}
