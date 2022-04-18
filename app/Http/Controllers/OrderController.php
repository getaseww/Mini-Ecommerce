<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\OrderedProduct;

class OrderController extends Controller
{

    // public function create(){
    //     return view('order');
    // }

    public function store(Request $request)
    {
        request()->validate([
            'name' => 'required',
            'email' => 'required',
            'address' => 'required',
            'phone' => 'required',
        ]);
        $attributes = $request->all();

        $order = Order::create($attributes);
        $cart = session()->get('cart');
        foreach($cart as $c){
            $atr['order_id']=$order->id;
            $atr['product_id']=2;
            $atr['quantity']=$c['quantity'];
            OrderedProduct::create($atr);
        }
        $request->session()->forget('cart');
        return redirect('/');
    }
}
