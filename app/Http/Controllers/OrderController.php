<?php

namespace App\Http\Controllers;

use App\Models\Image;
use App\Models\Order;
use App\Models\Orderdetail;
use App\Models\Phone;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
            })->with('user')->paginate(8);
        }else{
            $order = Order::with('user', 'orderdetails')->paginate(8);
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
            'status' => 0,
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
        // $order = order::with('user')->findOrFail($id);
        // $orderdetail = orderdetail::with('phone')->findOrFail($id);

        $order = Order::with('user', 'orderdetails.phone.image')->findOrFail($id);

        return view('dashboard.order-detail', compact('order'))->with('title', 'Detail Order');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $order = order::with('user', 'orderdetails')->findOrFail($id);
        $user = User::where('role', 2)->get();
        $phone = Phone::all();

        return view('dashboard.order-edit', compact('order', 'user', 'phone'))->with('title', 'Edit Order');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $totalamount = $request->price * $request->quantity;

        $order = Order::find($id);

        if ($order) {
            $order->update([
                'user_id' => $request->user_id,
                'status' => $request->status,
                'totalamount' => $totalamount,
            ]);

            $orderdetail = $order->orderDetails()->first();

            if ($orderdetail) {
                $orderdetail->update([
                    'phone_id' => $request->phone_id,
                    'quantity' => $request->quantity,
                    'price' => $request->price,
                ]);
            }
        }

        return redirect('order')->with('status', 'Data Edited Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $order = Order::findOrFail($id);

        $order->orderDetails()->delete();
        $order->delete();

        return redirect('order')->with('status', 'Data Deleted Successfully');
    }

    public function trash()
    {
        $order = DB::table('orders')
        ->join('orderdetails', 'orders.id', '=', 'orderdetails.order_id')
        ->join('users', 'orders.user_id', '=', 'users.id')
        ->join('phones', 'orderdetails.phone_id', '=', 'phones.id')
        ->whereNotNull('orders.deleted_at')
        ->paginate(8);

        return view('dashboard.order-trash', compact('order'))->with('title', 'Trash');
    }

    public function restore($id = null)
    {
        if($id !== null){
            $order = Order::onlyTrashed()->where('id', $id);
            $order->restore();
            
            $orderdetail = Orderdetail::onlyTrashed()->where('order_id', $id);
            $orderdetail->restore();
        }else{
            $order = Order::onlyTrashed();
            $order->restore();
        
            $orderdetail = Orderdetail::onlyTrashed();
            $orderdetail->restore();
        }

        return redirect('order/trash')->with('status', 'Data Restored Successfully');
    }

    public function deletepermanently($id = null)
    {
        if($id !== null){
            $order = Order::onlyTrashed()->findOrFail($id);
            $orderdetail = $order->orderdetails()->forceDelete();
            $order->forceDelete();
        }else{
            $orderdetail  = Orderdetail::onlyTrashed()->forceDelete();
            $order = Order::onlyTrashed()->forceDelete();
        }
        
        return redirect('order/trash')->with('status', 'Data Permanently Deleted Successfully');
    }
}
