<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index(){

        return view('dashboard');
    }

    public function upload(){
        return view('admin.upload');
    }

    
    public function store(Request $request)
    {
        $request->validate([
            'nama_project' => 'required|string|max:255',
            'link' => 'required',
            'keterangan' => 'required|string|max:255',
            'tugas_pending' => 'required|string|max:255',
        ]);
  
        Project::create($request->all());
   
        return redirect()->route('project.store')->with('success','Data project berhasil dinput.');

        // dd($request->all());
    }
}
