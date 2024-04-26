<?php

namespace App\Http\Controllers;

use App\Models\food\food;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
       $breakfast=food::select()->take(4)->where('category','Breakfast')->orderBy('id','desc')->get();
       $launch=food::select()->take(4)->where('category','launch')->orderBy('id','desc')->get();
       $dinner=food::select()->take(4)->where('category','dinner')->orderBy('id','desc')->get();

       return view('home',['breakfast'=>$breakfast,'dinner'=>$dinner,'launch'=>$launch]);
    }
}
