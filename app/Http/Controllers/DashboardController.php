<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Orderdetail;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $order = Order::with('user','orderdetails', 'orderdetails.phone')->get();

        $user = DB::table('users')->select(DB::raw('count(*) as total_user'))->where('role', 2)->where('deleted_at', null)->get();
        $product = DB::table(('phones'))->select(DB::raw('count(*) as total_product'))->get();
        $outofstock = DB::table(('phones'))->select(DB::raw('count(*) as total_outofstock'))->where('stock',0)->get();
        $order = DB::table('orders')->select(DB::raw('count(*) as total_order'))->get();

        // return $outofstock;
        

        return view('dashboard.index', compact('user','product','outofstock','order'))->with('title', 'Dashboard');
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
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
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
