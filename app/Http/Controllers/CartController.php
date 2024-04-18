<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function cart(){
        $cart = Cart::where('user_id', Auth::user()->id)->with('user', 'phone.image')->get();

        return view('home.cart', compact('cart'));
    }
    
    public function addtocart(Request $request){
        
        $userId = $request->input('user_id');
        $phoneId = $request->input('phone_id');

        $existingEntry = Cart::where('user_id', $userId)
                                ->where('phone_id', $phoneId)
                                ->first();

        if ($existingEntry) {
            return redirect()->route('home.home')->with('error', 'Barang yang Anda input sudah ada.');
        }

        Cart::create([
            'user_id' => $request->user_id,
            'phone_id' => $request->phone_id,
            'quantity' => 1,
        ]);

        return redirect()->route('home.home');
    }

    public function deletecart($id){
        
        Cart::where('id', $id)->delete();

        return redirect()->back();
    }
}
