<?php

namespace App\Http\Controllers\Client;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\Category;

class HomeController extends Controller
{
    public function index(){
        $homeCategories = Category::
        select('categories.name')
        ->limit('10')
        ->get();
        $products = Product::with(['author', 'publisher', 'category'])
        ->limit('8')
        ->get();

        return view('clients.home.shop_home', compact('homeCategories','products'));
    }
    public function productDetails($idProduct) {
        $homeCategories = Category::
        select('categories.name')
        ->limit('10')
        ->get();
        $products = Product::where('id', $idProduct)->first();
        $productLike = Product::limit('5')->get();
        return view('clients.products.product_details', compact('homeCategories','products','productLike'));
    }

    public function contact(){
        return view('clients.contact.contact');
    }
}
