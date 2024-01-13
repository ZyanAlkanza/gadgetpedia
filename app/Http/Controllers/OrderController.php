<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Orderdetail;
use App\Models\Phone;
use App\Models\User;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {   
        if($request->has('search')){
            $order = Order::whereHas('user', function($query) use ($request) {
                $query->where('username', 'LIKE', '%' . $request->search . '%');
            })->with('user')->get();
        }else{
            $order = Order::with('user', 'orderdetails')->get();
        }

        return view('dashboard.order', compact('order'))->with('title', 'Order');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $user   = User::where('role', 2)->get();
        $phone  = Phone::all();

        return view('dashboard.order-create', compact('user', 'phone'))->with('title', 'Add Order');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $totalamount = $request->price * $request->quantity;

        $request->validate([
            'user_id' => 'required',
            'phone_id' => 'required',
            'price' => 'required',
            'quantity' => 'required'
        ]);

        $order = Order::create([
            'user_id' => $request->user_id,
            'totalamount' =>$totalamount,
        ]);

        $orderdetail = $order->orderDetails()->create([
            'phone_id' => $request->phone_id,
            'quantity' => $request->quantity,
            'price' => $request->price
        ]);

        return redirect('order')->with('status', 'Data Added Successfully');
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
