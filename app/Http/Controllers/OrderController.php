<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Orderdetail;
use App\Models\Phone;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $order = Order::with('user', 'orderdetails')->get();

        return view('dashboard.order', compact('order'))->with('title', 'Order');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.order-create')->with('title', 'Add Order');
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
    public function show(string $id)
    {
        $order = order::with('user')->findOrFail($id);
        $orderdetail = orderdetail::with('phone')->findOrFail($id);

        return view('dashboard.order-detail', compact('order', 'orderdetail'))->with('title', 'Detail Order');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $order = order::findOrFail($id);

        return view('dashboard.order-edit', compact('order'))->with('title', 'Edit Order');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
