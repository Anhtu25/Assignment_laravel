<?php

namespace App\Http\Controllers\Admin;

use App\Models\Publisher;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Http\Controllers\Controller;

class PublisherController extends Controller
{
    public function listPublishers(){
        $publishers = Publisher::paginate(10);
        return view('admins.publishers.listPublishers', compact('publishers'));
    }

    public function addPublishers()
    {
        return view('admins.publishers.addPublishers');
    }
    public function storePublishers(Request $req)
    {
        // Xác thực dữ liệu đầu vào
        $req->validate([
            'namePublisher' => 'required'
        ], [
            'namePublisher.required' => 'Không được để trống tên'
        ]);

        // Chuẩn bị dữ liệu để lưu
        $data = [
            'name' => $req->namePublisher, // Sử dụng $req->name nếu trường trong form là 'name'
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ];

        // Tạo bản ghi mới trong cơ sở dữ liệu
        Publisher::create($data);

        // Chuyển hướng và thông báo thành công
        return redirect()->route('admins.publishers.listPublishers')->with('message', 'Thêm mới thành công');
    }

    public function editPublishers($idPublisher)
    {
        $publishers = Publisher::where('id', $idPublisher)->first();
        return view('admins.publishers.editpublishers', compact('publishers'));
    }
    public function updatePublishers($idPublisher,Request $req)
    {
        $publishers = Publisher::findOrFail($idPublisher);
        $publishers->update([
            'name' => $req->namePublisher
        ]);
        return redirect()->route('admins.publishers.listPublishers')->with(['message' => 'Chỉnh sửa thành công']);
    }


    public function deletePublishers(Request $req)
    {
        $publishers = Publisher::find($req->idPublisher);
        $publishers->delete();
        return redirect()->back()->with(['message' => 'Xóa thành công']);
    }
}
