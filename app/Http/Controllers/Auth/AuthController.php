<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function Login()
    {
        return view('auth.login');
    }
    public function checkLogin(Request $request)
    {
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password], true)) {
            if (Auth::user()->user_type == 0) {
                return redirect()->route('admin.dashboard');
            } else if (Auth::user()->user_type == 1) {
                if (Auth::user()->vendor_type == !null) {
                    return redirect()->route('vendor.dashboard');
                } else {
                    return redirect()->route('vendor.vendors');
                }
            } else {
                return redirect()->back()->with('error', 'Something wents wrong!!');
            }
        } else {
            return redirect()->back()->with('error', 'Invalid Email or Password');
        }
    }
    public function Logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }

    public function register()
    {
        return view('vendor.auth.register');
    }
    public function storeRegister(Request $request)
    {
        $request->validate([
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
            'confirm_password' => 'required|same:password',
        ]);
        $register = new User();
        $register->email = $request->email;
        $register->password = Hash::make($request->password);
        $register->user_type = 1;
        $register->save();
        return redirect()->route('vendor.vendors')->with('success', 'Registration Successfull');
    }
}
