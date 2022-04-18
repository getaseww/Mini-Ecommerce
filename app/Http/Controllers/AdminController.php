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
        $this->middleware('role:ADMIN');
    }

    public function index()
    {
        $users = User::with('roles')->paginate(8);
        return view('admin.users', compact('users'));
    }

    // public function users(){
    //     return view('admin.users',compact('users'));
    // }

    public function destroy($id)
    {
        User::find($id)->delete();
        return redirect('/admin/dashboard')->with('status', 'User deleted successfully!');
    }

    public function makeAdmin($id)
    {
        $user = User::find($id);
        $user->roles()->attach(['role_id' => 1]);
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
            'password' => Hash::make($data['password']),
        ]);
        $u=User::find($user->id);
        $u->roles()->attach([
            'role_id'=>1,]);

       
        return redirect('/admin/dashboard')->with('status', 'Admin added successfully');
    }

    // $u=User::find($user->id);
    // $u->roles()->attach([
    //     'role_id'=>2,]);
}
