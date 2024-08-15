<?php

namespace App\Http\Controllers\Client;

use App\Models\Cart;
use App\Models\Category;
use App\Models\CartDetail;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function cart()
    {
        $homeCategories = Category::
        select('categories.name')
        ->limit('10')
        ->get();
        $cart = Cart::where('user_id', Auth::id())
            ->with('cartDetails:id,cart_id,product_id,quantity')
            ->with('cartDetails.product:id,name,price')
            ->with('cartDetails.product.category:id,name')
            ->first();

        return view('clients.cart.cart')->with([
            'cart'  => $cart,
            'homeCategories'=>$homeCategories
        ]);
    }
    public function checkOut()
    {
        $homeCategories = Category::
        select('categories.name')
        ->limit('10')
        ->get();
        return view('clients.cart.check_out')->with([

            'homeCategories'=>$homeCategories
        ]);
    }
    public function addToCart(Request $req)
    {
        $cart = Cart::where('user_id', Auth::id());
        if ($cart->exists()) {
            // Đã có giỏ hàng => cập nhật Cart detail
            $cart = $cart->first();
            $cartDetail = CartDetail::where('cart_id',  $cart->id)->where('product_id', $req->product_id);
            if ($cartDetail->exists()) {
                $cartDetail->update([
                    'quantity'  => intval($cartDetail->first()->quantity) + intval($req->quantity)
                ]);
            } else {
                CartDetail::create([
                    'cart_id' => $cart->id,
                    'product_id' => $req->product_id,
                    'quantity'  => $req->quantity
                ]);
            }
        } else {
            // Tạo giỏ hàng => Tạo cart detail
            $newCart = Cart::create([
                'user_id' => Auth::id()
            ]);
            CartDetail::create([
                'cart_id' => $newCart->id,
                'product_id' => $req->product_id,
                'quantity'  => $req->quantity
            ]);
        }

        return redirect()->route('users.viewCart');
    }



    public function updateCart(Request $req)
    {
        foreach ($req->cartDetailId as $key =>  $cartDetailId) {
            CartDetail::find($cartDetailId)->update([
                'quantity' => $req->quantity[$key]
            ]);
        }

        return redirect()->back()->with([
            'mesage' => 'Cập nhật thành công'
        ]);
    }


    public function deleteCart(Request $req)
    {
        CartDetail::find($req->cartDetailId)
            ->delete();
        return redirect()->back()->with([
            'message' => 'Xóa thành công'
        ]);
    }
}
