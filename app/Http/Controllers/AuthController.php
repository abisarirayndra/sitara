<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Role;
use Hash;
use Auth;

class AuthController extends Controller
{
    public function login(){
        return view('auth.login');
    }

    public function upload_login(Request $request){
        $check = User::where('email', $request->email)->first();
        if(!Hash::check($request->password, $check->password)){
            return redirect()->back()->with('errors', 'Wrong Password!');
        }
        $credentials = [
            'email' => $request->email,
            'password' => $request->password,
        ];

        if(Auth::attempt($credentials)){
            if(auth()->user()->role_id == 1){
                return redirect()->route('admin.dashboard')->with('success','Hi, Admin!');
            }
            elseif (auth()->user()->role_id == 2) {
                return redirect()->route('manager.dasboard')->with('success', 'Hi, Manager!');
            }

        }else {
            return redirect()->route('login')->withErrors(['msg' => 'Akun tidak ditemukan']);
        }
    }

    public function register(){
        $roles = Role::all();
        return view('auth.register', compact('roles'));
    }

    public function upload_register(Request $request){
        $check = User::where('email', $request->email)->first();
        if($check){
            return redirect()->back()->with('errors', 'Email Already Taken!');
        }

        User::create([
            'nama' => $request->nama,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role_id' => $request->role_id,
        ]);

        return redirect()->route('login')->with('success','Successfully Registered!');
    }

    public function logout(){
        Auth::logout();
        return redirect()->route('login')->with('success','Logout Successfully!');
    }


}
