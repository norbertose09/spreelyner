<?php

namespace App\Http\Controllers;

use session;
use Illuminate\Session\Store;
use App\Models\Cart;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class paymentController extends Controller
{
    public function index(){
        return view('pages.payments.index', [
            'cart' => cart::all()
        ]);
    }


    public function pod(){
          if(Auth::id()){
            // return redirect()->back();
            $id=Auth::user()->id;

            $cartdet = cart::where('user_id', '=', $id)->get();
            foreach($cartdet as $cartdet){
            
             $order = new Order;

             $order->name = $cartdet->name;
             $order->firstname = $cartdet->firstname;
             $order->lastname = $cartdet->lastname;
             $order->email = $cartdet->email;
             $order->phone = $cartdet->mobile_number;
             $order->address = $cartdet->address;
             $order->country = $cartdet->name;
             $order->city = $cartdet->city;
             $order->state = $cartdet->state;
             $order->zip = $cartdet->zip;
             $order->product_name = $cartdet->product_name;
             $order->price = $cartdet->unit_price;
             $order->quantity = $cartdet->quantity;
             $order->product_id = $cartdet->product_id;
             $order->user_id = $cartdet->user_id;
             $order->payment_status = 'processing';
             $order->delivery_status = 'payment on delivery';
             $totalPrice = $cartdet->total_price;

            //  session()->put('totalp', $totalPrice);

             $order->save(); 

             $cart_id = $cartdet->id;

             $cart = Cart::find($cart_id);

             $cart->delete();

            }
            return redirect('/')->with('success', 'You have successfully purchased these items, an email will be sent to you on information on tracking your items.');

        }
    }

    public function stripe($totalprice){
        return view('stripe', compact('totalprice'));

    }
}