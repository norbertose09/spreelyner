<?php

namespace App\Http\Controllers;


use App\Models\Admin;
use Illuminate\Http\Request;

class adminController extends Controller
{
    public function index(){
        return view('pages.admin.signin');
    }

    public function showsignup(){
        return view('pages.admin.signup');
    }

    public function signupauthenticate(Request $request){
        $formData = $request->validate([
            'username' => ['required', 'min:3'],
            'password' => 'required|confirmed|min:6'
        ]);
    $formData['password'] = bcrypt($formData['password']);
        $user = Admin::create($formData);
        if($user){
            auth()->login($user);
            return redirect('/admin/dashboard')->with('message', 'User created and logged in');
        }

    }

    public function showdashboard(){
        return view('pages.admin.dashboard');
    }

    public function showorders(){
        return view('pages.admin.orders');
    }
}
