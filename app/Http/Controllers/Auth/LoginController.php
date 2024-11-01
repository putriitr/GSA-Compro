<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    use AuthenticatesUsers;

    protected $redirectTo = '/';

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
        $this->middleware('auth')->only('logout');
    }

    public function login(Request $request)
    {
        // Validasi input
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required',
        ]);

        // Coba autentikasi pengguna
        if (auth()->attempt(['email' => $request->email, 'password' => $request->password])) {
            // Cek peran pengguna
            $user = Auth::user();

            if ($user->type == 'admin') {
                return redirect()->route('dashboard'); // Portal admin
            } elseif ($user->type == 'member') {
                return redirect('/'); // Portal member
            } elseif ($user->type == 'distributor') {
                return redirect('/'); // Portal distributor
            }
        }

        // Jika autentikasi gagal, kembali dengan error
        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);
    }


    public function logout(Request $request)
    {
        $user = Auth::user(); // Capture the user before logging out

        Auth::logout(); // Log the user out
        $request->session()->invalidate(); // Invalidate the session
        $request->session()->regenerateToken(); // Regenerate the CSRF token

        // Redirect berdasarkan peran pengguna
        if ($user && $user->role === 'admin') {
            return redirect('/login'); // Redirect admin users to the login page
        } elseif ($user && $user->role === 'member') {
            return redirect('/'); // Redirect member users to the homepage
        } elseif ($user && $user->role === 'distributor') {
            return redirect('/'); // Redirect distributor users to the homepage
        }

        return redirect('/'); // Fallback to homepage for other roles
    }
}
