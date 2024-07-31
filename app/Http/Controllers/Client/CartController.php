<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function cart(){
        return view('clients.cart.cart');
    }
    public function checkOut(){
        return view('clients.cart.check_out');
    }
}
