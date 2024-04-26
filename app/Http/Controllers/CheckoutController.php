<?php

namespace App\Http\Controllers;

use App\Models\cart;
use App\Models\checkout;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class CheckoutController extends Controller
{

    function __construct() {
        $this->Middleware("auth");
      }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        request()->validate([
            // 'user_id' => 'required',
            'email' => 'required',
            'name' => 'required',
            'num_of_people' => 'required',
            'datetime' => 'required',
            'town' => 'required',
            'country' => 'required',
            'phone' => 'required',
            'address' => 'required',
            'price' => 'required',
            'zipcode' => 'required',
        ]);
        $totalPrice = cart::where('user_id', Auth::user()->id)
                      ->join('food', 'carts.food_id', '=', 'food.id')
                      ->sum('food.price');

        $checkout=checkout::create(
            [
                'name'=>$request->name,
                'email'=>$request->email,
                'town'=>$request->town,
                'country'=>$request->country,
                'phone'=>$request->phone,
                'adderss'=>$request->address,
                'user_id'=>Auth::user()->id,
                'price'=>$totalPrice,
                'status'=>"proccessed",
                'zipcode'=>$request->zipcode]
            );
            $checkout->save();
            return to_route('paypal');

    }


    public function checkoutstore(Request $request)
    {
        $value=$request->price;
        session(['price' => $value]);

        // $price=session::get('price');
        // dd( $price);

          return to_route('checkout');

    }
    public function checkout()
    {
        if(cart::all()->count()==0){
            abort('403');
           }else{

               $user=User::where('id',Auth::user()->id)->get();
               // dd($user);
               return view('meals.check',compact('user'));
           }

    }
    public function paywithpaypal()
    {
        if(cart::all()->count()==0){
            abort('403');
           }else{

               return view('meals.pay');
           }
    }
    public function paypalsuccess()
    {

        $cart=cart::where('user_id',Auth::user()->id);
        $cart->update(['status'=>"paied"]);

        if(cart::all()->count()==0){
            abort('403');
        }else{
           $cart->delete();
            session::forget('price');
            return view('meals.success');
       }

    }



}

