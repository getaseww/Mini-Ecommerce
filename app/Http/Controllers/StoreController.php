<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Product;
class StoreController extends Controller
{
    public function index(){
        $users=User::with('roles')->paginate(9);
        return view('stores',compact('users'));
    }
    public function findStore($id){
        $user=User::find($id);
        $categories=$user->categories()->where('visible',1)->get();
        $products=$user->products()->orderBy('created_at','desc')->take(9)->get();
        // $products=$pro->categories()->get();
        return view('homePage',compact('user','categories','products'));
    }
    public function mainHomePage(){
        $stores=User::with('roles')->skip(3)->take(5)->get();
        return view('mainHomePage',compact('stores'));
    }
    public function show($user_id,$slug){
        $user=User::find($user_id);        
        $categories=$user->categories()->where('visible',1)->get();
        $product=$user->products()->where('slug',$slug)->get();
        // $category=$product->categories()->first();
        return view('singleProduct',compact('user','categories','product'));
    }

    public function listByCat($user_id,$cat_slug){
        $user=User::find($user_id);        
        $categories=$user->categories()->where('visible',1)->get();
        $products=$user->products()->where('slug',$cat_slug)->get();
      //  $products=$cat->products()->get();
        return view('homePage',compact('user','categories','products'));
    }
}
