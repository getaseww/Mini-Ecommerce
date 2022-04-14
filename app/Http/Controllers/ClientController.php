<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ClientController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('role:CLIENT');
    }

    public function index()
    {
        return view('client.dashboard');
    }
}
