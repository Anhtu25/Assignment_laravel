<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        return view('clients.home.shop_home');
    }
    public function contact(){
        return view('clients.contact.contact');
    }
}
