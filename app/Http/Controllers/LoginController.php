<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    // nemapilkan hasil view
    public function index()
    {
        return view('login.index', [
            'title' => 'Login',
            'active' => 'login'
        ]);
    }

    // bagian tangkap dari post login
    public function authenticate(Request $request)
    {
        // bagian pengamanan login
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
            
        ]);
        
        // bagian session
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended('/dashboard');
        }
        // memunculkan hasil error
        return back()->with('loginError', 'Login Gagal!');
    }

    // bagian logout
    public function logout()
    {
        Auth::logout();
 
        request()->session()->invalidate();
     
        request()->session()->regenerateToken();
     
        return redirect('/');

    }
}