<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function getLogin(){
        return view('admin.auth.login');
    }

    public function postLogin(Request $request){
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        $validated = auth()->attempt([
            'email' => $request->email,
            'password' => $request->password,
            'is_admin' => 1
        ]);
        if($validated){
            return redirect()->route('dashboard')->with('success', 'Login successful.');
        }else{
            return redirect()->back()->with('error', 'Invalid credentials.');
        }
    }

    public function logout() {
        Auth::logout();
        return redirect()->route('getLogin');
    }
}
