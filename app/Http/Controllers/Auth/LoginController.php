<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{


    use AuthenticatesUsers;

    public function redirectTo() {
        $role = Auth::user()->role; 
        if($role==='ADMIN'){
            return RouteServiceProvider::ADMIN;
        }
        if($role==='CLIENT'){
            return RouteServiceProvider::CLIENT;
        }
      }
    // protected $redirectTo = RouteServiceProvider::ADMIN;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
}
