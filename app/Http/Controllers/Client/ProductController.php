<?php

namespace App\Http\Controllers\Client;

use App\Models\Cart;
use App\Models\Product;
use App\Models\Category;
use App\Models\CartDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    public function shopProducts()
    {
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
        $homeCategories = Category::select('categories.name')
            ->limit('10')
            ->get();
        $products = Product::paginate(9);
        return view('clients.products.shop_products', compact('homeCategories', 'products','cartQuantity'));
    }

    public function search(Request $req)
    {
        $userId = Auth::id(); // Lấy ID người dùng hiện tại

        // Lấy ID giỏ hàng của người dùng hiện tại
        $cartId = Cart::where('user_id', $userId)->value('id');

        if ($cartId) {
            // Đếm tổng số lượng sản phẩm trong giỏ hàng đó
            $cartQuantity = CartDetail::where('cart_id', $cartId)
                ->count();
        } else {
            // Nếu không có giỏ hàng, số lượng sản phẩm là 0
            $cartQuantity = 0;
        }
        $nameSearch = $req->input('nameSearch');
        $categories = $req->input('categories');

        $query = Product::select('id', 'name', 'image', 'price', 'price_sale')
            ->where('name', 'like', "%{$nameSearch}%");

        if ($categories && !in_array('all', $categories)) {
            $query->whereIn('category_id', $categories);
        }

        $products = $query->paginate(9);

        $homeCategories = Category::select('id', 'name')
            ->limit(10)
            ->get();

        return view('clients.products.shop_products', compact('homeCategories', 'products','cartQuantity'));
    }
    public function filterByCategory($id)
    {
        $homeCategories = Category::find($id);
        $products = Product::where('category_id', $id)->get();

        return view('clients.products.shop_products', compact('products', 'homeCategories'));
    }

    // public function productDetails($idProduct){
    //     $detailProduct = Product::where('id', $idProduct)->first();
    //     // $categoryProduct = DB::table('categories')->select('id', 'name')->get();
    //     // $authorProduct = DB::table('authors')->select('id', 'name')->get();
    //     // $publisherProduct = DB::table('publisher')->select('id', 'name')->get();
    //     return view('clients.products.product_details', compact('detailProduct'));
    // }
}
