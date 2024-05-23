<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function index()
    {
        return view('login.index', [
            'title' => 'Login',
            'active' => 'login',
        ]);
    }

    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required',
            'password' => 'required'
        ]);
    
        if (Auth::attempt($credentials)) {
            $user = Auth::user();
    
            // Check if the user has the 'admin' role
            if ($user->role === 'Administrator') {
                $request->session()->regenerate();
                return redirect()->intended('/dashboard/users');
            } else {
                Auth::logout(); // Log out non-admin users
                return back()->with('loginError', 'You do not have permission to access the dashboard.');
            }
        }
        return back()->with('loginError', 'Wrong email or password! Login failed.');
    }

    public function logout()
    {
        Auth::logout();
        request()->session()->invalidate();
        request()->session()->regenerateToken();
        return redirect('/login');
    }
}
