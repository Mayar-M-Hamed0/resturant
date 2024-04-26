<?php

namespace App\Http\Controllers;

use App\Models\cart;
use App\Models\User;
use GuzzleHttp\Middleware;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    function __construct() {
      $this->Middleware("auth");
    }
    public function index()
    {
        $cart=cart::where('user_id',Auth::user()->id)->get();
        $totalPrice = Cart::where('user_id', Auth::user()->id)
                      ->join('food', 'carts.food_id', '=', 'food.id')
                      ->sum('food.price');
        return view('meals.cart',compact('cart'),compact('totalPrice'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request ,$id)
    {
        cart::create(
            [
                'user_id'=>Auth::user()->id,
                'food_id'=>$request->food_id,

            ]);
            // $request->all());
        return redirect()->route('food.show',$id)->with(['success'=>'item added to cart successfully']);
    }

    /**
     * Display the specified resource.
     */
    public function show(cart $cart)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(cart $cart)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, cart $cart)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(cart $cart)
    {

        $cart->forceDelete();

        return to_route('cart.index')->with("orderdeleted","order deleted succefully");
    }
}
