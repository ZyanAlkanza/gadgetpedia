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
        $product = DB::table(('phones'))->select(DB::raw('count(*) as total_product'))->where('deleted_at', null)->get();
        $outofstock = DB::table(('phones'))->select(DB::raw('count(*) as total_outofstock'))->where('stock',0)->get();
        $order = DB::table('orders')->select(DB::raw('count(*) as total_order'))->where('deleted_at', null)->get();

        $pending = Order::where('status', 0)->count();
        $process = Order::where('status', 1)->count();
        $delivery = Order::where('status', 2)->count();
        $success = Order::where('status', 3)->count();


        // $chart = DB::table('orders')->select(DB::raw("DATE_FORMAT(created_at, '%M') as month"), DB::raw("COUNT(*) as total"))->groupBy('month')->get();

        // $labels = [];
        // $data = [];
        
        // foreach ($chart as $row) {
        //     $labels[] = $row->month;
        //     $data[] = $row->total;
        // }
        
        // $chartdata = [
        //     'labels' => $labels,
        //     'data' => $data,
        // ];

        return view('dashboard.index', compact('user','product','outofstock','order', 'pending', 'process', 'delivery', 'success'))->with('title', 'Dashboard');
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
