<?php

namespace App\Http\Controllers;

use Stripe;
use Session;
use App\Models\Cart;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class StripePaymentController extends Controller
{
    public function stripe()
    {
        return view('stripe');
    }
    
    /**
     * success response method.
     *
     * @return \Illuminate\Http\Response
     */
    public function stripePost(Request $request, $totalprice)
    {
        Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
    
        Stripe\Charge::create ([
                "amount" => $totalprice * 100,
                "currency" => "usd",
                "source" => $request->stripeToken,
                "description" => "Thanks for shopping with us." 
        ]);


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
         $order->delivery_status = 'paid';
         $totalPrice = $cartdet->total_price;

        //  session()->put('totalp', $totalPrice);

         $order->save(); 

         $cart_id = $cartdet->id;

         $cart = Cart::find($cart_id);

         $cart->delete();

        }
      
        Session::flash('success', 'Payment successful!');
              
        return back();
    }

}
