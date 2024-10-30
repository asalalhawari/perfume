<?php
namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login'); // Create a login view
    }

    public function login(Request $request)
    {
        // Validate the incoming request
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        // Attempt to log the user in
        if (Auth::attempt($request->only('email', 'password'))) {
            // Check the role of the user
            $user = Auth::user();
            if ($user->role === 'admin') {
                return redirect()->route('dashboard'); // Redirect admin to dashboard
            } else {
                return redirect()->route('home'); // Redirect user to home page
            }
        }

        // If authentication fails, redirect back to login with an error message
        return redirect()->back()->withErrors(['email' => 'Invalid credentials.'])->withInput();
    }

    public function dashboard()
    {
        return view('admin.dashboard'); // Create a dashboard view
    }

    public function home()
    {
        return view('home'); // Create a home view
    }
}
