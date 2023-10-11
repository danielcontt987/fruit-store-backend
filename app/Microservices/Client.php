<?php

namespace App\Microservices;

use App\Models\Client as ModelsClient;
use Illuminate\Support\Facades\DB;

class Client extends Microservice
{
    public static function list($request)
    {
        $clients = ModelsClient::where('user_id', $request->user_id)
        ->where('business_id', $request->business_id)
        ->select(
            'id',
            'business_id',
            'user_id',
            DB::raw("CONCAT(clients.name,' ',clients.last_name) as name"),
        )
        ->get();
        return $clients;
    }
}
