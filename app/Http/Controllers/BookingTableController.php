<?php

namespace App\Http\Controllers;

use App\Models\bookingTable;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class BookingTableController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
        request()->validate([
            // 'user_id' => 'required',
            'email' => 'required',
            'name' => 'required',
            'num_of_people' => 'required',
            'datetime' => 'required',
        ]);

            bookingTable::create([
                     'name'=>$request->name,
                     'email'=>$request->email,
                     'datetime'=>$request->datetime,
                     'num_of_people'=>$request->num_of_people,
                     'sp_request'=>$request->sp_request,
                     'user_id'=>Auth::user()->id,

            ]);

            return redirect()->route('home')->with(["bookinTable"=>"table booked successuflly"]);

    }

    /**
     * Display the specified resource.
     */
    public function show(bookingTable $bookingTable)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(bookingTable $bookingTable)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, bookingTable $bookingTable)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(bookingTable $bookingTable)
    {
        //
    }
}
