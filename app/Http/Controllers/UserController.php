<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function home()
    {

        $user = Auth::user();
        

        $project = Project::with('user', 'department')
                        ->where('user_id', $user->id) 
                        ->get();

        return view('users.home', compact('user', 'project'));
    }

    public function create()
    {
        return view('users.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6',
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);

        return redirect()->route('users.index')->with('success', 'User berhasil ditambahkan.');
    }

     // Tambahkan metode untuk menampilkan home.blade.php

     public function index()
    {
        return view('users.index');
    }


     public function allList()
    {
        $project = Project::with('user','department')->get();
        return view ('users.all-list', compact('project'));
    }


}
