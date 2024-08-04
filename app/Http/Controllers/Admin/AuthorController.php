<?php

namespace App\Http\Controllers\Admin;

use App\Models\Author;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Http\Controllers\Controller;

class AuthorController extends Controller
{
    public function listAuthors(){
        $authors = Author::paginate(10);
        return view('admins.authors.listAuthors', compact('authors'));
    }
    public function addAuthors()
    {
        return view('admins.authors.addAuthors');
    }
    public function storeAuthors(Request $req)
    {
        // Xác thực dữ liệu đầu vào
        $req->validate([
            'nameAuthor' => 'required'
        ], [
            'nameAuthor.required' => 'Không được để trống tên'
        ]);

        // Chuẩn bị dữ liệu để lưu
        $data = [
            'name' => $req->nameAuthor, // Sử dụng $req->name nếu trường trong form là 'name'
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ];

        // Tạo bản ghi mới trong cơ sở dữ liệu
        Author::create($data);

        // Chuyển hướng và thông báo thành công
        return redirect()->route('admins.authors.listAuthors')->with('message', 'Thêm mới thành công');
    }

    public function editAuthors($idAuthor)
    {
        $authors = Author::where('id', $idAuthor)->first();
        return view('admins.authors.editAuthors', compact('authors'));
    }
    public function updateAuthors($idAuthor,Request $req)
    {
        $authors = Author::findOrFail($idAuthor);
        $authors->update([
            'name' => $req->nameAuthor
        ]);
        return redirect()->route('admins.authors.listAuthors')->with(['message' => 'Chỉnh sửa thành công']);
    }


    public function deleteAuthors(Request $req)
    {
        $authors = Author::find($req->idAuthor);
        $authors->delete();
        return redirect()->back()->with(['message' => 'Xóa thành công']);
    }
}
