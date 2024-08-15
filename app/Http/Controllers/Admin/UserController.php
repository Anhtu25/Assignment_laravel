<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function userManager()
    {
        $listUser = User::select('id', 'name', 'email', 'role')->get();
        $user = User::paginate(10);
        $adminManagerCount = DB::table('users')->where('role', 1)->count();
        $userManagerCount = DB::table('users')->where('role', 2)->count();

        return view('admins.dashboard.userManager', compact('user', 'adminManagerCount', 'userManagerCount'));
    }
    public function addUsers(Request $req)
    {
        // $imageUrl = '';
        // if ($req->hasFile('imageUser')) {
        //     $image = $req->file('imageUser');
        //     $nameImage = time() . '.' . $image->getClientOriginalExtension();
        //     $link = 'imageUser/';
        //     $image->move(public_path($link), $nameImage);
        //     $imageUrl = $link . $nameImage;
        // }

        $req->validate([
            'name' => ['required', 'min:5', 'max:22'],
            'email' => ['required', 'email', 'max:255'],
            'password' => ['required', 'min:8', 'max:255'],
            'role' => 'required'
        ], [
            'name.required' => 'Vui lòng nhập Họ và Tên',
            'name.min' => 'Vui lòng nhập Họ và Tên trên 5 kí tự',
            'name.max' => 'Vui lòng nhập Họ và Tên dưới 22 kí tự',
            'email.required' => 'Vui lòng nhập Email',
            'email.max' => 'Tài khoản Email quá dài không hợp lệ',
            'password.required' => 'Vui lòng nhập mật khẩu',
            'password.min' => 'Vui lòng nhập mật khẩu dài hơn 8 kí tự',
            'password.max' => 'Mật khẩu quá dài...',
            'role.required' => 'Vui lòng chọn vai trò'
        ]);

        $check = User::where('email', $req->email)->exists();
        if (!$check) {
            $newUser = new User();
            $newUser->name = $req->name;
            $newUser->email = $req->email;
            $newUser->password = Hash::make($req->password);
            $newUser->role = $req->role;
            $newUser->save();
        } else {
            return redirect()->back()->with(['message' => 'Email đã tồn tại']);
        }

        return redirect()->back()->with('message', 'Thêm mới thành công');
    }

    public function delUser(Request $req)
    {
        $users = User::find($req->idUser);
        if ($users) {
            // if ($users->image != null && $users->image != '') {
            //     File::delete(public_path($users->image));
            // }
            $users->delete();
            return redirect()->back()->with(['message' => 'Xóa thành công']);
        }
        return redirect()->back()->with(['message' => 'Không tìm thấy người dùng']);
    }


    public function detailUser(Request $req)
    {
        $user = User::where('id', $req->id)
            ->select('id', 'name', 'email', 'role')
            ->first();
        return json_encode($user);
    }
    public function updateUser(Request $req)
    {
        // echo $req->name;
        $req->validate([
            'idUser' => 'required',
            'name' => 'required',
            'email' => ['required', 'email'],
            'role' => 'required'

        ]);

        $user = User::where('id', $req->idUser);
        if ($user->exists()) {
            $data = [
                'name' => $req->name,
                'email' => $req->email,
                'role' => $req->role
            ];
            $user->update($data);
        }
        return redirect()->back()->with(['message' => 'Chỉnh sửa thành công']);
    }


    public function test()
    {
        return view('test');
    }
    public function postTest(Request $req)
    {
        if ($req->hasFile('image')) {
            $image = $req->file('image');
            $newName = time() . '-' . $image->getClientOriginalName();
            $path = $image->storeAs('images', $newName, 'public');
            echo $path;
        }
    }
}
