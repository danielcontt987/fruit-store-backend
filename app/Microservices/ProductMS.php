<?php

namespace App\Microservices;

use App\Models\Product as ProductModel;

class ProductMS extends Microservice
{
    public static function list()
    {
        $products = ProductModel::get();
        return $products;
    }
}
