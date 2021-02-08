<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\AdminLogin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login() {
        return view('dashboard.auth.login');
    }
    public function checkLogin(AdminLogin $request){
        if(!Auth::attempt(['phone'=>$request['phone'] , 'password' =>$request['password'] ])){
            return redirect()->back()->with(['error'=> 'رقم الجوال أو كلمه المرور غير صحيحه! حاول مره أخري.']);
        }
        return redirect()->route('dashboard');
    }
    public function dashboard(){
        return view('layouts.master-dashboard');
    }
}
