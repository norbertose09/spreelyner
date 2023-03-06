<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;



class UserController extends Controller
{
   public function register(){
    return view('pages.users.register');
   }

   public function signin(){
    return view('pages.users.signin');
   }

   public function registerConfig(Request $request){
    $formData = $request->validate([
        'name' => ['required', 'min:3'],
        'email' => ['required','email', Rule::unique('users', 'email')],
        'password' => 'required|confirmed|min:6'

    ]);
    $formData['password'] = bcrypt($formData['password']);
    $user = User::create($formData);

    if($user){
        auth()->login($user);
        return redirect('/')->with('message', 'User created and logged in');
    }
   }

   public function logout(Request $request){
    auth()->logout();

     //To invalidate session and regenerate token
     $request->session()->invalidate();
     $request->session()->regenerateToken();

     return redirect('/');
   }

   public function authenticate(Request $request){
    $formData2 = $request->validate([
        'name' => ['required'],
        'password' => ['required']
    ]);
    if(auth()->attempt($formData2)){
        $request->session()->regenerate();

        return redirect('/');
    }
    return back()->withErrors(['name' => 'Invalid Credentials'])->onlyInput('name');

   }
}
