<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('admin');
    }

    public function index()
    {
        $users = User::paginate(8);
        return view('admin.users', compact('users'));
    }

    // public function users(){
    //     return view('admin.users',compact('users'));
    // }

    public function destroy($id)
    {
        $user=User::find($id);
        $user->delete();
        return redirect('/admin/dashboard')->with('status', 'User deleted successfully!');
    }

    public function makeAdmin($id)
    {
        $user = User::find($id);
        $user->role='ADMIN';
        $user->update();
        return redirect('/admin/dashboard')->with('status', 'User role changed successfully!');
    }

    public function addAdmin()
    {
        return view('admin.addAdmin');
    }

    public function store(Request $request)
    {
       $data= request()->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
        $user= User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'role' => 'ADMIN',
            'password' => Hash::make($data['password']),
        ]);
        return redirect('/admin/dashboard')->with('status', 'Admin added successfully');
    }

    // $u=User::find($user->id);
    // $u->roles()->attach([
    //     'role_id'=>2,]);
}
