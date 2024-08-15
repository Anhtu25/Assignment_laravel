<?php

namespace App\Http\Controllers;

use Directory;
use App\Models\User;
use App\Mail\NewRegistered;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Password;

class AuthenController extends Controller
{
    public function login()
    {

        return view('auth.Login');
    }
    public function postLogin(Request $req)
    {
        $req->validate(
            [
                'email' => ['required', 'email', 'max:255'],
                'password' => ['required', 'min:8', 'max:100']
            ],
            [
                'email.required' => 'Vui lòng nhập Email',
                'email.max' => 'Tài khoản Email quá dài không hợp lệ ',
                'password.required' => 'Vui lòng nhập mật khẩu',
                'password.min' => 'Vui lòng nhập mật khẩu dài hơn 8 kí tự ',
                'password.max' => 'Mật khẩu quá dài ...'
            ]
        );

        $credentials = $req->only('email', 'password');
        $remember = $req->has('remember');

        if (Auth::attempt($credentials, $remember,[
            'email' => $req->email,
            'password' => $req->password
        ])) {
            return redirect()->route('admins.homeAdmin');
        } else {
            return redirect()->back()->with([
                'errorsMessage' => 'Email hoặc Mật Khẩu không đúng !!!'
            ]);
        }
    }
    public function register()
    {
        return view('auth.Register');
    }
    public function postRegister(Request $req)
    {
        //     echo $req->username . '' . $req->email . '' . $req->password;

        $req->validate([
            'username' => ['required', 'min:5', 'max:22'],
            'email' => ['required', 'email', 'max:255'],
            'password' => ['required', 'min:8', 'max:100']
        ], [
            'username.required' => 'Vui lòng nhập Họ và Tên',
            'username.min' => 'Vui lòng nhập Họ và Tên trên 5 kí tự',
            'username.max' => 'Vui lòng nhập Họ và Tên dưới 22 kí tự',
            'email.required' => 'Vui lòng nhập Email',
            'email.max' => 'Tài khoản Email quá dài không hợp lệ ',
            'password.required' => 'Vui lòng nhập mật khẩu',
            'password.min' => 'Vui lòng nhập mật khẩu dài hơn 8 kí tự ',
            'password.max' => 'Mật khẩu quá dài ...'
        ]);

        $check = User::where('email', $req->email)->exists();
        if (!$check) {
            $newUser = new User();
            $newUser->name = $req->username;
            $newUser->email = $req->email;
            $newUser->password = Hash::make($req->password);
            $newUser->remember_token = str::random(60);
            // $newUser->role = $req->role;
            $newUser->save();
        } else {
            return redirect()->back()->with([
                'message' => 'Email này đã tồn tại '
            ]);
        }
        return redirect()->back()->with([
            'message' => 'Đăng ký thành công !'
        ]);
    }
    public function forgotpassword()
    {
        return view('auth.ForgotPassword');
    }
    public function authSendEmail(Request $req)
    {
        // echo $req->email;
        $req->validate([
            'email' => 'required|email',
        ]);

        $user = User::where('email', $req->email)->first();

        if (!$user) {
            return redirect()->back()->with([
                'errors' => 'Email không tồn tại trong hệ thống.',
            ]);
        }

        $status = Password::sendResetLink(
            $req->only('email')
        );

        return response()->back()->with([
            'success' => $status,
        ]);
    }
    public function passwordChange()
    {
        return view('auth.PasswordChange');
    }
    public function notificationDone()
    {
        return view('auth.NotificationDoneMessages');
    }
    public function logout(){
        Auth::logout();
        return redirect()->route('authors.login')->with(['Đăng xuất thành công']);
    }
}
