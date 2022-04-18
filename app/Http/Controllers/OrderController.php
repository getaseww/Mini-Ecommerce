<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
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
        
        Order::create($attributes);
        return redirect('/');
    }
}
