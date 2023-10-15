<?php

namespace App\Microservices;

use App\Models\SaleBox as ModelsSaleBox;

class SaleBox extends Microservice
{
    public static function list($request)
    {
        $saleboxes = ModelsSaleBox::where('user_id', $request->user_id)->get();
        return $saleboxes;
    }

    public static function store($request)
    {
        $salebox = ModelsSaleBox::create([
            'name' => $request->request->get('name'),
            'user_id' => $request->request->get('user_id'),
        ]);
        return $salebox;
    }
}
