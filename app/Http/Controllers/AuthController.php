<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use App\Models\User;

class AuthController extends Controller
{
    public function ShowLogin()
{
    return view('auth.login');
}

public function Login(Request $request)
{
    // Validasi input username dan password
    $request->validate([
        'username' => 'required', // Ganti 'email' dengan 'username'
        'password' => 'required',
    ]);

    // Ambil data request username dan password saja
    $credential = $request->only('username', 'password'); // Ganti 'email' dengan 'username'

    // Cek jika data username dan password valid (sesuai) dengan data
    if (Auth::attempt($credential)) {
        // Kalau berhasil, simpan data user di variabel $user
        $user = Auth::user();

        // Arahkan ke dashboard
        return redirect()->intended('/dashboard');
    }

    // Jika tidak ada data user yang valid, kembalikan lagi ke halaman login
    // Kirim pesan error jika login gagal
    return redirect('/login')
        ->withInput()
        ->withErrors(['login_gagal' => 'These credentials do not match our records.']);
}

    public function logout(Request $request){
        // logout itu harus menghapus session nya 
        
                $request->session()->flush();
        
        // jalan kan juga fungsi logout pada auth 
        
                Auth::logout();
        // kembali kan ke halaman login
                return Redirect('login');
    }

    // Menampilkan halaman register
    public function showRegister()
    {
        return view('auth.register');
    }

    // Proses registrasi
    public function register(Request $request)
    {
        $request->validate([
            'kode_dealer' => 'required|string|max:255',
        'nama_dealer' => 'required|string|max:255',
        'username' => 'required|string|max:255|unique:users',
        'password' => 'required|confirmed|min:8',
        ]);

        // Membuat pengguna baru
        User::create([
            'kode_dealer' => $request->kode_dealer,
        'nama_dealer' => $request->nama_dealer,
        'username' => $request->username,
        'password' => Hash::make($request->password),
        ]);

        return redirect()->route('auth.login')->with('success', 'Registration successful! Please login.');
    }

    public function showForgotPasswordForm()
{
    return view('auth.forgot-password');
}

public function sendResetLink(Request $request)
{
    $request->validate(['email' => 'required|email']);
    $status = Password::sendResetLink($request->only('email'));

    return $status === Password::RESET_LINK_SENT
        ? back()->with(['status' => __($status)])
        : back()->withErrors(['email' => __($status)]);
}
}
