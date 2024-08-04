<?php

namespace App\Http\Controllers\Admin;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redis;

class CategoryController extends Controller
{
    public function listCategories()
    {
        $categories = Category::paginate(10);
        return view('admins.categories.listCategoties', compact('categories'));
    }

    public function addCategories()
    {
        return view('admins.categories.addCategories');
    }
    public function storeCategories(Request $req)
    {
        // Xác thực dữ liệu đầu vào
        $req->validate([
            'name' => 'required'
        ], [
            'name.required' => 'Không được để trống tên'
        ]);

        // Chuẩn bị dữ liệu để lưu
        $data = [
            'name' => $req->name, // Sử dụng $req->name nếu trường trong form là 'name'
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ];

        // Tạo bản ghi mới trong cơ sở dữ liệu
        Category::create($data);

        // Chuyển hướng và thông báo thành công
        return redirect()->route('admins.categories.listCategories')->with('message', 'Thêm mới thành công');
    }

    public function detailCategories($idCategory)
    {
        $categories = Category::where('id', $idCategory)->first();
        return view('admins.categories.detailCategories', compact('categories'));
    }
    public function editCategories($idCategory)
    {
        $categories = Category::where('id', $idCategory)->first();
        return view('admins.categories.editCategories', compact('categories'));
    }
    public function updateCategories($idCategory,Request $req)
    {
        $categories = Category::findOrFail($idCategory);
        $categories->update([
            'name' => $req->nameCategory
        ]);
        return redirect()->route('admins.categories.listCategories')->with(['message' => 'Chỉnh sửa thành công']);
    }

    public function deleteCategories(Request $req)
    {
        $categories = Category::find($req->idCategory);
        $categories->delete();
        return redirect()->back()->with(['message' => 'Xóa thành công']);
    }
}
