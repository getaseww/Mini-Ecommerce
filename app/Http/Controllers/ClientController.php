<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
class ClientController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('role:CLIENT');
    }

    public function index()
    {
        $user=User::find(Auth::user()->id);
        $categories=$user->categories()->count();       
        $products=$user->products()->count();

        return view('client.index',compact('categories','products'));
    }
}
