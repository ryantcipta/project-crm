<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    
   // Menampilkan form untuk menambah project
   public function create()
   {
       return view('users/upload');
   }

   public function store(Request $request)
   {
       // Validasi input
       $request->validate([
           'departemen' => 'required|string|max:255',
           'nama_project' => 'required|string|max:255',
           'link' => 'nullable|url',
           'keterangan' => 'nullable|string',
           'video_tutorial' => 'nullable|url',
       ]);

       // Simpan data ke database
       $project = new Project();
       $project->departemen = $request->departemen;
       $project->nama_project = $request->nama_project;
       $project->link = $request->link;
       $project->keterangan = $request->keterangan;
       $project->video_tutorial = $request->video_tutorial;
       $project->save();

       // Redirect dengan pesan sukses
       return redirect()->route('users.index')->with('success', 'Project berhasil diupload!');
   }
}
