<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Image;
use App\Models\Order;
use App\Models\Orderdetail;
use App\Models\Phone;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TransactionController extends Controller
{
    public function buynow($id){
        $phone = Phone::find($id);
        $image = Image::where('phone_id', $id)->first();
        $auth = Auth::user();

        return view('home.buy-now', compact('phone', 'image', 'auth'));
    }

    public function checkout(Request $request){
        
        $order = Order::create([
            'user_id'       => $request->user_id,
            'totalamount'   => $request->price * $request->quantity,
        ]);

        $order->orderDetails()->create([
            'phone_id' => $request->phone_id,
            'quantity' => $request->quantity,
            'price' => $request->price,
        ]);

        return redirect('payment')->with('status', '');
    }

    public function cartcheckout(Request $request){
        $cartItems = $request->input('cart');
        
        foreach ($cartItems as $cartItem) {
            $order = Order::create([
                'user_id' => $cartItem['user_id'],
                'totalamount' => $cartItem['price'] * $cartItem['quantity'],
            ]);

            $order->orderDetails()->create([
                'phone_id' => $cartItem['phone_id'],
                'quantity' => $cartItem['quantity'],
                'price' => $cartItem['price'],
            ]);
        }

        Cart::where('user_id', $cartItems[0]['user_id'])->delete();
        
        return redirect('payment')->with('status', '');
    }

    public function payment(){
        return view('home.payment');
    }

    public function status(){
        $order = Order::where('user_id', Auth::user()->id)->with('orderdetails.phone.image')->get();
        
        return view('home.transaction', compact('order'));
    }
}
