<?php

namespace App\Http\Controllers;

use App\Models\Departments;
use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    
   // Menampilkan form untuk menambah project
   public function create()
   {
        $departments = Departments::with('projects')->get(); 
        return view('users.upload', compact('departments'));
   }

   public function store(Request $request)
   {
       // Validasi input
       $validated = $request->validate([
        'nama_project' => 'required|string|max:255',
        'link' => 'required',
        'keterangan' => 'required|string|max:255',
        'video_tutorial' => 'required|string|max:255',
        'department_id' => 'required|exists:departments,id',
        
    ]);
    
    $project = new Project();
    $project->nama_project = $validated['nama_project'];
    $project->link = $validated['link'];
    $project->keterangan = $validated['keterangan'];
    $project->video_tutorial = $validated['video_tutorial'];
    $project->department_id = $validated['department_id'];
    $project->user_id = auth()->id(); 
    $project->save();


    // Project::create($request->all());

    return redirect()->route('users.home')->with('success','Data project berhasil dinput.');
   }

   public function ShowEdit($id)
    {
       
        $project = Project::findOrFail($id);
        $departments = Departments::all();
        return view('users.upload_edit', compact('project', 'departments'));
    }

    public function update(Request $request, $id)
    {
        
        $validated = $request->validate([
            'nama_project' => 'required|string|max:255',
            'link' => 'required',
            'keterangan' => 'required|string|max:255',
            'video_tutorial' => 'required|string|max:255',
            'department_id' => 'required|exists:departments,id',
        ]);
    
      
        $project = Project::findOrFail($id);
    
        // Perbarui data project
        $project->nama_project = $validated['nama_project'];
        $project->link = $validated['link'];
        $project->keterangan = $validated['keterangan'];
        $project->video_tutorial = $validated['video_tutorial'];
        $project->department_id = $validated['department_id'];
        $project->save();
    
       
        return redirect()->route('users.home')->with('success', 'Data project berhasil diperbarui.');
    }
}
