<?php

namespace App\Http\Controllers;

use App\Microservices\ProductMS;
use Illuminate\Http\Request;


class ProductController extends Controller
{
    public function list()
    {
        return response()->json(["products" => ProductMS::list(), "status" => 200]);
    }
}
