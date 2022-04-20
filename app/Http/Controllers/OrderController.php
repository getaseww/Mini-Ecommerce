<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use Illuminate\Support\Facades\DB;

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
        foreach ($cart as $c) {
            $now = date('Y-m-d H:i:s');
            DB::insert('insert into order_products (order_id,product_id,quantity,created_at,updated_at) values(?,?,?,?,?)', [$order->id, $c['id'], $c['quantity'], $now, $now]);
        }
        $request->session()->forget('cart');
        return redirect('/');
    }

    public function show($id)
    {
        $order = Order::findOrFail($id);
        return view('client.orderDetaile', compact('order'));
    }
    public function update($id)
    {
        DB::table('order_products')
            ->where('id', $id)
            ->update(['status' => 'completed']);
        return redirect()->back()->with('status', 'Successfully deleted');
    }
    public function delete($id)
    {
        Order::findOrFail($id)->delete();
        return redirect()->back()->with('status', 'Successfully deleted');
    }
}
