<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Penulis;

class LoginController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function showRegisterForm()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {
        $request->validate([
            'nama_depan'    => 'required|string|max:50',
            'nama_belakang' => 'required|string|max:50',
            'user_name'     => 'required|string|max:50|unique:penulis,user_name',
            'password'      => 'required|string|min:6',
        ]);

        Penulis::create([
            'nama_depan'    => $request->nama_depan,
            'nama_belakang' => $request->nama_belakang,
            'user_name'     => $request->user_name,
            'password'      => bcrypt($request->password),
            'foto'          => 'default.png',
        ]);

        return redirect()->route('login')->with('sukses', 'Pendaftaran akun penulis berhasil! Silakan masuk.');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'user_name' => 'required|string',
            'password'  => 'required|string',
        ]);

        if (Auth::attempt(['user_name' => $credentials['user_name'], 'password' => $credentials['password']])) {
            $request->session()->regenerate();
            session(['waktu_login' => now()->toDateTimeString()]);
            return redirect()->intended('dashboard')->with('sukses', 'Anda berhasil masuk ke dalam sistem CMS.');
        }

        return back()->withErrors([
            'user_name' => 'Username atau password yang Anda masukkan tidak selaras.',
        ])->onlyInput('user_name');
    }

    // =========================================================================
    // PERBAIKAN WORKFLOW LOGOUT: DIALIKKAN LANGSUNG KE BERANDA PENGUNJUNG (LANDING PAGE)
    // =========================================================================
    public function logout(Request $request)
    {
        Auth::logout();

        // Bersihkan dan amankan data session internal server
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        // Dialihkan secara mulus ke halaman utama pengunjung (bukan halaman login)
        return redirect()->route('blog.index')->with('sukses', 'Anda telah berhasil keluar dari sesi administrator.');
    }
}
