<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    public function listClient(Request $request) 
    {
        $clients = Client::where('user_id', $request->id)->with('user')->get();
        
        return response()->json(['status' => 200, 'clients' => $clients]);
 
    }

    public function createClient(Request $request) 
    {
        Client::create([
            'name' => $request->name,
            'phone' => $request->phone,
            'user_id' => intval($request->user_id),
            'status' => $request->status,
            'email' => $request->email,
        ]);

        return response()->json(['status' => 200]);
 
    }


}
