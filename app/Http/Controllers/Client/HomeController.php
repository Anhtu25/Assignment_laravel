<?php

namespace App\Http\Controllers\Client;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index(){
        $userId = Auth::id(); // Lấy ID người dùng hiện tại

        // Lấy ID giỏ hàng của người dùng hiện tại
        $cartId = DB::table('cart')->where('user_id', $userId)->value('id');

        if ($cartId) {
            // Đếm tổng số lượng sản phẩm trong giỏ hàng đó
            $cartQuantity = DB::table('cart_detail')
                ->where('cart_id', $cartId)
                ->count();
        } else {
            // Nếu không có giỏ hàng, số lượng sản phẩm là 0
            $cartQuantity = 0;
        }
        $homeCategories = Category::
        select('categories.name')
        ->limit('10')
        ->get();
        $products = Product::with(['author', 'publisher', 'category'])
        ->limit('8')
        ->get();

        return view('clients.home.shop_home', compact('homeCategories','products','cartQuantity'));
    }

    public function productDetails($idProduct) {
        $userId = Auth::id(); // Lấy ID người dùng hiện tại

        // Lấy ID giỏ hàng của người dùng hiện tại
        $cartId = DB::table('cart')->where('user_id', $userId)->value('id');

        if ($cartId) {
            // Đếm tổng số lượng sản phẩm trong giỏ hàng đó
            $cartQuantity = DB::table('cart_detail')
                ->where('cart_id', $cartId)
                ->count();
        } else {
            // Nếu không có giỏ hàng, số lượng sản phẩm là 0
            $cartQuantity = 0;
        }
        $homeCategories = Category::
        select('categories.name')
        ->limit('10')
        ->get();
        $products = Product::where('id', $idProduct)->first();
        $productLike = Product::limit('5')->get();
        return view('clients.products.product_details', compact('homeCategories','products','productLike','cartQuantity'));
    }
    // public function filterByCategory($idCategories)
    // {
    //     $category = Category::findOrFail($idCategories); // Sử dụng findOrFail để xử lý trường hợp không tìm thấy category
    //     $products = Product::where('category_id', $idCategories)->paginate(9);

    //     $homeCategories = Category::select('id', 'name')->limit(10)->get();

    //     return view('clients.products.shop_products', compact('products', 'category', 'homeCategories'));
    // }
    public function contact(){
        $homeCategories = Category::
        select('categories.name')
        ->limit('10')
        ->get();
        $userId = Auth::id();
        $cartId = DB::table('cart')->where('user_id', $userId)->value('id');

        if ($cartId) {
            // Đếm tổng số lượng sản phẩm trong giỏ hàng đó
            $cartQuantity = DB::table('cart_detail')
                ->where('cart_id', $cartId)
                ->count();
        } else {
            // Nếu không có giỏ hàng, số lượng sản phẩm là 0
            $cartQuantity = 0;
        }
        return view('clients.contact.contact', compact('cartQuantity','homeCategories'));
    }
}
