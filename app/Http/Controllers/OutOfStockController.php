<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Phone;

class OutOfStockController extends Controller
{
    public function index(){
        $phone = Phone::where('stock', 0)->paginate(8);

        return view('dashboard.outofstock', compact('phone'))->with('title', 'Out Of Stock');
    }
}
