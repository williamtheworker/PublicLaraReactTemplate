<?php

namespace App\Http\Controllers\Products;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\ProductsModel;
use Session;

class ProductsController extends Controller {

    public function product_create () {
        $product = ProductsModel::create(
            [
                'name' => 'Product 1',
                'details' => 'Product 1 Details'
            ]
        );

        return $product;
        /* Returned Data is */
        /*
            {
                "name":"Product 1",
                "details":"Product 1 Details",
                "date_updated":"2022-08-17T01:17:16.000000Z",
                "date_created":"2022-08-17T01:17:16.000000Z",
                "id":2
            }
        */
    }

}