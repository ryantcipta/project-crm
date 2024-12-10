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
        Project::create([
            'departemen' => $request->departemen,
            'nama_project' => $request->nama_project,
            'link' => $request->link,
            'keterangan' => $request->keterangan,
            'video_tutorial' => $request->video_tutorial,
        ]);

        // Redirect dengan pesan sukses
        return redirect()->route('projects.create')->with('success', 'Project berhasil diupload!');
    }
}
