<?php

namespace App\Http\Controllers;

use App\Models\cart;
use App\Models\User;
use App\Models\Order;
use App\Models\Allproduct;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function showCheckout(){

               if(Auth::id()){
            $id=Auth::user()->id;
            $user = Auth::user();

        $cartdetails = cart::where('user_id', '=', $id)->get();

        return view('pages.users.checkout',[
            'cartdetails' => $cartdetails,
            'user' =>$user
        ]);
    }

        
        else {
            return view('pages.users.signin');
        }
    
    
    }

    public function checkoutProcessing(Request $request, User $id){
        $formField = $request->validate([
         'firstname' => 'required',
         'lastname' => 'required',
         'name' => 'required',
         'email' => 'required',
         'mobile_number' => 'required',
         'address' => 'required',
         'country' => 'required',
         'state' => 'required',
         'city' => 'required',
         'zip' => 'required'
        ]);

        
        // dd($formField);
     $save = $id->update($formField);
     if($save){
        $user_id=Auth::user()->id;
     return view('pages.payments.index',[
        'cart' => cart::where('user_id', '=', $user_id)->get()
     ]);

     }

    }

}
