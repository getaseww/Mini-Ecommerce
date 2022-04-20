<?php

namespace App\Http\Controllers;

use App\Models\OrderedProduct;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\User;
class ClientController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $user=User::find(Auth::user()->id);
        $categories=$user->categories()->count();       
        $products=$user->products()->count();

        $pros=$user->products()->get();
        $allOrders = DB::table('order_products')->get();
        $orders=[];
        foreach($allOrders as $order){
            foreach($pros as $pro){
                if($order->product_id==$pro->id){
                    $newObj=['id'=>$order->id,'order_id'=>$order->order_id,'product_id'=>$order->product_id,'quantity'=>$order->quantity,'status'=>$order->status];
                    array_push($orders,$newObj);
                }
            }
        }
        $ordersCount=count($orders);
        return view('client.index',compact('categories','products','ordersCount'));
    }

    public function orders(){
        $user=User::find(Auth::user()->id);
        $products=$user->products()->get();
        $allOrders = DB::table('order_products')->get();
        $orders=[];
        foreach($allOrders as $order){
            foreach($products as $pro){
                if($order->product_id==$pro->id){
                    $newObj=['id'=>$order->id,'order_id'=>$order->order_id,'product_id'=>$order->product_id,'quantity'=>$order->quantity,'status'=>$order->status];
                    array_push($orders,$newObj);
                }
            }
        }
        return view('client.order',compact('orders','products'));
    }
}
