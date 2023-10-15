<?php

namespace App\Microservices;

use App\Models\CashCut as ModelsCashCut;
use Carbon\Carbon;

class CashCut extends Microservice
{
    public static function list($request)
    {
        $cashcuts = ModelsCashCut::where('sale_box', $request->user_id)->get();
        return $cashcuts;
    }

    public static function get($request)
    {
        $cashcut = ModelsCashCut::with(['user', 'salebox'])
        ->where('user_id', $request->user_id)->where('date_close', '=', null)
        ->where('business_id', $request->business_id)->orderBy('id', 'desc')->first();
        return $cashcut;
    }

    public static function store($request)
    {

        $cashcut = ModelsCashCut::where('user_id', $request->request->get('user_id'))
        ->where('business_id',  $request->request->get('business_id'))->orderBy('id', 'desc')->count();
        
        if($cashcut == 0){
            $folio  = str_pad((1), 5, "0", STR_PAD_LEFT);
        }else{
            $folio  = str_pad(($cashcut->folio + 1), 5, "0", STR_PAD_LEFT);
        }

        $cashcut = ModelsCashCut::create([
            'amount' => $request->request->get('amount'),
            'current' => 0.00,
            'current_mount' => $request->request->get('amount'),
            'difference' => 0.00,
            'little_box' => $request->request->get('amount'),
            'observations' => $request->request->get('comment'),
            'business_id' => $request->request->get('business_id'),
            'folio' => $folio,
            'real_cash' => 0.00,
            'real_card' => 0.00,
            'real_check' => 0.00,
            'real_transfer' => 0.00,
            'total_accumulator' => $request->request->get('amount'),
            'date_close' => null,
            'date_opening' => Carbon::now()->format('Y-m-d H:i:s'),
            'user_id' => $request->request->get('user_id'),
            'salebox_id' => $request->request->get('salebox_id'),
        ]);
        return $cashcut;
    }
}
