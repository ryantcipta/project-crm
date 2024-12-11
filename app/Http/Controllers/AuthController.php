<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AuthController extends Controller
{
    public function ShowLogin(){
        return view('auth.login');
    }

    public function Login(Request $request){

          // kita buat validasi pada saat tombol login di klik
      // validas nya username & password wajib di isi 
      $request->validate([
        'email'=>'required|email',
        'password'=>'required'
    ]);

   
   // ambil data request username & password saja 
    $credential = $request->only('email','password');

  // cek jika data username dan password valid (sesuai) dengan data
    if(Auth::attempt($credential)){
       // kalau berhasil simpan data user ya di variabel $user
        $user =  Auth::user();
        // cek lagi jika level user admin maka arahkan ke halaman admin
        // if($user->level =='admin'){
        //     return redirect()->intended('/dashboard')->with('sukses','Selamat datang Admin.');

        // }
          
         // jika belum ada role maka ke halaman /
        return redirect()->intended('/dashboard');
    }

    // jika ga ada data user yang valid maka kembalikan lagi ke halaman login
    // pastikan kirim pesan error juga kalau login gagal ya
    return redirect('/login')
        ->withInput()
        ->withErrors(['login_gagal'=>'These credentials does not match our records']);
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
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6|confirmed',
        ]);

        // Membuat pengguna baru
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        return redirect()->route('auth.login')->with('success', 'Registration successful! Please login.');
    }
}
