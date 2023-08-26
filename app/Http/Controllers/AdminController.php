<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function index()
    {
        return view('auth.admin.login');
    }

    public function login(Request $request)
    {
        if (Auth::guard('admin')->attempt(['email' => $request->email, 'password' => $request->password])) {
            return redirect()->route('admin.dashboard')->with('success', 'Login successfull!');
        } else {
            return back()->with('error', 'Invalid email or password');
        }
    }

    public function dashboard()
    {
        return view('admin-dashboard');
    }

    public function logout()
    {
        Auth::guard('web')->logout();

        return redirect()->route('admin.login.index');
    }
}
