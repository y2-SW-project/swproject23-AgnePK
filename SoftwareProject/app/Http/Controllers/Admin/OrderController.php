<?php

namespace App\Http\Controllers\Admin;

use App\Models\Order;
use App\Models\User;
use App\Models\Jewellery;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = Auth::user();
        $user->authorizeRoles('admin');

        $orders = Order::where('user_id', '=', $user->id)->get();
        return view('admin.orders.show')->with('orders', $orders);
        /*
        I want to be able to be able to go into the logged in users' 
        orders. I dont know how to make the connections and where to include the
        orders. Do i need a a different page for listing order items?
         */
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
    public function show(Order $order)
    {
        $user = Auth::user();
        $user->authorizeRoles('admin');

        $user = Order::where('user_id', '=', $user->id)->get();

        // $jewellery = Order::where('jewellery_id', '=', $jewellery->id)->get();
        $eachJewellery = Jewellery::with('orders')->get();
        return view('admin.orders.show')->with('order', $order)->with('user', $user)->with('eachJewellery', $eachJewellery);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Order $order)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Order $order)
    {
        //
    }
}
