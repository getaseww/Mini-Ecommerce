<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class LoginController extends Controller
{


    use AuthenticatesUsers;

    protected function authenticated(Request $request, $user)
    {
        $roles=$user->roles()->get();
        if (1) { // do your magic here
            // Log::info($roles);
            return redirect()->route('admin.dashboard');
        }
    }
    protected $redirectTo = RouteServiceProvider::ADMIN;

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
