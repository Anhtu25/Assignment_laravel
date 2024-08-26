<?php

namespace App\Http\Controllers\Client;

use App\Models\Cart;
use App\Models\Category;
use App\Models\CartDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function cart()
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



        $homeCategories = Category::select('categories.name')
            ->limit('10')
            ->get();
        $cart = Cart::where('user_id', Auth::id())
            ->with('cartDetails:id,cart_id,product_id,quantity')
            ->with('cartDetails.product:id,name,price')
            ->with('cartDetails.product.category:id,name')
            ->first();

        return view('clients.cart.cart')->with([
            'cart'  => $cart,
            'homeCategories' => $homeCategories,
            'cartQuantity' => $cartQuantity
        ]);
    }
    public function checkOut()
    {
        $homeCategories = Category::select('categories.name')
            ->limit('10')
            ->get();
        return view('clients.cart.check_out')->with([

            'homeCategories' => $homeCategories
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

        return redirect()->back();
    }



    public function updateCart(Request $req)
    {
        // Validation để kiểm tra dữ liệu đầu vào
        $req->validate([
            'quantity' => 'required|array',
            'quantity.*' => 'integer|min:1' // Đảm bảo tất cả quantity đều là số nguyên và >= 1
        ]);

        foreach ($req->quantity as $cartDetailId => $quantity) {
            // Tìm CartDetail theo ID
            $cartDetail = CartDetail::find($cartDetailId);
            if ($cartDetail) {
                // Cập nhật số lượng
                $cartDetail->update([
                    'quantity' => $quantity
                ]);
            }
        }

        return redirect()->back()->with('message', 'Cập nhật thành công');
    }




    public function deleteCart(Request $req)
    {
        // dd($req->cartDetailId);
        $deleteCart =  CartDetail::find($req->cartDetailId);
        $deleteCart->delete();
        return redirect()->back()->with([
            // 'deleteCart' => $deleteCart,
            'message' => 'Xóa thành công'
        ]);
    }
}
