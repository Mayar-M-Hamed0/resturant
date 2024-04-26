<?php

namespace App\Http\Controllers;

use App\Models\cart;
use App\Models\food\food;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FoodController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
    //    $breakfast=food::all();  //where('category','Breakfast')->get();
    //     // return $breakfast;
    //    return view('home',['breakfast'=>$breakfast]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(food $food)
    {

        if(Auth::user()){

            $verfyCart=cart::where('food_id',$food->id)->where('user_id',Auth::user()->id)->count();
            return view ('meals.food-details',['food'=>$food],compact('verfyCart'));
        }
        else{
            $verfyCart=0;
            return view ('meals.food-details',['food'=>$food],compact('verfyCart'));

        }
        // dd($verfyCart);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(food $food)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, food $food)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(food $food)
    {
        //
    }
}
