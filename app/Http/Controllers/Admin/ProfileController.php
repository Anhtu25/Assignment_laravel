<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function profilePageAdmin(){
        return view('admins.profiles.page-profile-admin');
    }

    public function profileSettingAdmin(){
        return view('admins.profiles.setting-profile-admin');
    }
}
