<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function shopProducts(){
        return view('clients.products.shop_products');
    }
    public function productDetails(){
        return view('clients.products.product_details');
    }
}
