<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class AdminController extends Controller
{
    public function userAdmin()
    {
        $users = User::all();


        return view('admins.home.home-admin', compact('users'));
    }
    public function adminAnalytic()
    {

        return view('admins.dashboard.analytic');
    }
    // public function userManager()
    // {
    //     $adminManagerCount = DB::table('users')->where('role', 1)->count();
    //     $userManagerCount = DB::table('users')->where('role', 2)->count();

    //     return view('admins.dashboard.userManager', compact('adminManagerCount', 'userManagerCount'));
    // }
}
