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
            'username' => 'required',
            'password' => 'required',
        ]);
    
        // Ambil data request username dan password saja
        $credential = $request->only('username', 'password');
    
        // Cek jika data username dan password valid
        if (Auth::attempt($credential)) {
            // Kalau berhasil, simpan data user di variabel $user
            $user = Auth::user();
    
            // Jika level adalah MD, arahkan ke halaman admin
            if ($user->level === 'MD') {
                return redirect()->intended('/dashboard');
            }
            
            // Jika level adalah D, arahkan ke halaman users
            if ($user->level === 'D') {
                return redirect()->intended('/users');
            }
    
            // Jika level tidak valid, logout user dan tampilkan pesan error
            Auth::logout();
            return redirect('/login')
                ->withInput()
                ->withErrors(['login_gagal' => 'Anda tidak memiliki akses yang valid.']);
        }
    
        // Jika autentikasi gagal, kembalikan ke halaman login
        return redirect('/login')
            ->withInput()
            ->withErrors(['login_gagal' => 'These credentials do not match our records.']);
    }
    

    public function logout(Request $request)
    {
        // Logout dengan menghapus session dan autentikasi
        $request->session()->flush();
        Auth::logout();

        // Kembali ke halaman login
        return redirect('login');
    }

    public function showRegister()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {
        $request->validate([
            'kode_dealer' => 'required|string|max:255',
            'nama_dealer' => 'required|string|max:255',
            'username' => 'required|string|max:255|unique:users',
            'password' => 'required|confirmed|min:6',
        ]);

        // Membuat pengguna baru
        User::create([
            'kode_dealer' => $request->kode_dealer,
            'nama_dealer' => $request->nama_dealer,
            'username' => $request->username,
            'password' => $request->password,
        ]);

        return redirect()->route('auth.login')->with('success', 'Registration successful! Please login.');
    }

    public function showForgotPasswordForm()
    {
        return view('auth.forgot-password');
    }

    public function resetPassword(Request $request)
    {
        // Validasi input dari form
        $request->validate([
            'username' => 'required|string',
            'kode_dealer' => 'required|string',
            'new_password' => 'required|string|min:6|confirmed',
        ]);

        // Cari user berdasarkan username dan kode dealer
        $user = User::where('username', $request->username)
            ->where('kode_dealer', $request->kode_dealer)
            ->first();

        // Jika user tidak ditemukan, kembalikan pesan error
        if (!$user) {
            return back()->withErrors(['username' => 'Invalid username or dealer code.']);
        }

        // Update password user
        $user->password = Hash::make($request->new_password);
        $user->save();

        // Redirect ke halaman login dengan pesan sukses
        return redirect()->route('login')->with('status', 'Password successfully reset.');
    }

}
