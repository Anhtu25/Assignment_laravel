<?php

namespace App\Http\Controllers\Admin;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;

class ProductController extends Controller
{
    public function listProducts()
    {
        $products = Product::with(['author', 'publisher', 'category'])->paginate(10);
        return view('admins.products.listProducts', compact('products'));
    }
    public function addProducts()
    {
        $categoryProduct = DB::table('categories')->select('id', 'name')->get();
        $authorProduct = DB::table('authors')->select('id', 'name')->get();
        $publisherProduct = DB::table('publisher')->select('id', 'name')->get();
        return view('admins.products.addProducts', compact('categoryProduct', 'authorProduct', 'publisherProduct'));
    }
    public function postProducts(Request $req)
    {
        $linkImage = '';
        if ($req->hasFile('imageProduct')) {
            $image = $req->file('imageProduct');
            $nameImage = time() . "." . $image->getClientOriginalExtension();
            $link = "imageProducts/";
            $image->move(public_path($link), $nameImage);
            $linkImage = $link . $nameImage;
        }
        $data = [
            'name' => $req->nameProduct,
            'author_id' => $req->authorProduct,
            'publisher_id' => $req->publisherProduct,
            'category_id' => $req->categoryProduct,
            'price' => $req->priceProduct,
            'price_sale' => $req->priceSaleProduct,
            'short_description' => $req->shortDescriptionProduct,
            'description' => $req->descriptionProduct,
            'year_published' => $req->yearPublishedProduct,
            'image' => $linkImage
        ];

        Product::create($data);
        return redirect()->route('admins.products.listProducts')->with([
            'message' => 'Thêm mới thành công'
        ]);
    }
    public function detailProducts($idProduct)
    {
        $product = Product::where('id', $idProduct)->first();
        return view('admins.products.detail-products')->with([
            'product' => $product
        ]);
    }
    public function editProducts($idProduct)
    {
        $product = Product::where('id', $idProduct)->first();
        $categoryProduct = DB::table('categories')->select('id', 'name')->get();
        $authorProduct = DB::table('authors')->select('id', 'name')->get();
        $publisherProduct = DB::table('publisher')->select('id', 'name')->get();
        return view('admins.products.edit-products')->with([
            'product' => $product,
            'categoryProduct' => $categoryProduct,
            'authorProduct' => $authorProduct,
            'publisherProduct' => $publisherProduct
        ]);
    }
    public function updateProducts($idProduct, Request $req)
    {

        $product = Product::findOrFail($idProduct);
        $imageUrl = $product->image;
        if ($req->hasFile('imageProduct')) {
            File::delete(public_path($product->image));
            $image = $req->file('imageProduct');
            $nameImage = time() . "." . $image->getClientOriginalExtension();
            $link = "imageProducts/";
            $image->move(public_path($link), $nameImage);
            $imageUrl = $link . $nameImage;
        }

        $product->update([
            'name' => $req->nameProduct,
            'author_id' => $req->authorProduct,
            'publisher_id' => $req->publisherProduct,
            'category_id' => $req->categoryProduct,
            'price' => $req->priceProduct,
            'price_sale' => $req->priceSaleProduct,
            'short_description' => $req->shortDescriptionProduct,
            'description' => $req->descriptionProduct,
            'year_published' => $req->yearPublishedProduct,
            'image' => $imageUrl
        ]);

        return redirect()->route('admins.products.listProducts')->with([
            'message' => 'Sửa thành công'
        ]);
    }

    public function deleteProduct(Request $req)
    {
        $product = Product::find($req->idProduct);
        if ($product->image != null && $product->image != '') {
            File::delete(public_path($product->image));
        }
        $product->delete();
        return redirect()->back()->with(['message' => 'Xóa thành công']);
    }
}
