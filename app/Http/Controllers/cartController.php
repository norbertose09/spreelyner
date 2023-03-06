<?php

namespace App\Http\Controllers;

use App\Models\cart;
use App\Models\Allproduct;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class cartController extends Controller
{
    //cart 

    public function cart(Request $request, $id){
        if(Auth::id()){
            // return redirect()->back();
            $user = Auth::user();
            $products = Allproduct::find($id);

            var_dump($user);
            // dd($id);
             $cart = new cart;

             $cart->name = $user->name;
             $cart->email = $user->email;
             $cart->product_name = $products->name;
             $cart->unit_price = $products->price;
             $cart->total_price = $products->price * $request->quantity;
             $cart->quantity = $request->quantity;
             $cart->image = $products->image;
             $cart->product_id = $products->id;
             $cart->user_id = $user->id;

             $cart->save();  

             return redirect()->back();

            // dd($products);
        }
        else {
            return redirect('/users/signin');
        }

    }


    //show cart page
    public function show(){

        if(Auth::id()){
            $id=Auth::user()->id;

        $cart = Cart::where('user_id', '=', $id)->get();
        return view('pages.users.cart',[
            'cart' => $cart
        ]);

        }
        else {
            return view('pages.users.signin');
        }
        
    }

    public function deleteCart(cart $id){
        $id->delete();
        return redirect()->back();
    }
}

