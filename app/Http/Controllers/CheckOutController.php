<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\CartDetail;
use App\Models\Category;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class CheckOutController extends Controller
{
    public function checkout()
    {

        $userId = Auth::id(); // Lấy ID người dùng hiện tại
        $auth = Auth::user();
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
        $cart = Cart::where('user_id', Auth::id())
            ->with('cartDetails:id,cart_id,product_id,quantity')
            ->with('cartDetails.product:id,name,price')
            ->with('cartDetails.product.category:id,name')
            ->first();
        $homeCategories = Category::select('categories.name')
            ->limit('10')
            ->get();
        return view('clients.cart.check_out')->with([
            'cart' => $cart,
            'auth'  => $auth,
            'homeCategories' => $homeCategories,
            'cartQuantity' => $cartQuantity
        ]);
    }

    public function postCheckout(Request $req)
    {

        $auth = Auth::user();
        $tongTien = 0;
        foreach ($auth->cartDetails as $cartDetail) {
            $tongTien += $cartDetail->product->price_sale * $cartDetail->quantity;
        }


        $data = [
            'name' => $req->name,
            'email' => $req->email,
            'phone' => $req->phone,
            'address' => $req->address,
            'user_id' => $auth->id
        ];
        if ($order = Order::create($data)) {
            // dd($order);
            foreach ($auth->cartDetails as $cart) {
                $data1 = [
                    'order_id' => $order->id,
                    'product_id' => $cart->product_id,
                    'price' => $tongTien,
                    'quantity' => $cart->quantity

                ];
                OrderDetail::create($data1);
            }
        }
    }
}
