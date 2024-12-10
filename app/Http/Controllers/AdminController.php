<?php

namespace App\Http\Controllers;

use App\Models\Departments;
use App\Models\Project;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index(){

        return view('dashboard');
    }

    public function upload(){
        $departments = Departments::with('projects')->get(); 
        return view('admin.upload', compact('departments'));
    }

    
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_project' => 'required|string|max:255',
            'link' => 'required',
            'keterangan' => 'required|string|max:255',
            'tugas_pending' => 'required|string|max:255',
            'department_id' => 'required|exists:departments,id',
            
        ]);
        
        $project = new Project();
        $project->nama_project = $validated['nama_project'];
        $project->link = $validated['link'];
        $project->keterangan = $validated['keterangan'];
        $project->tugas_pending = $validated['tugas_pending'];
        $project->department_id = $validated['department_id'];
        $project->user_id = auth()->id(); 
        $project->save();


        // Project::create($request->all());
   
        return redirect()->route('project.store')->with('success','Data project berhasil dinput.');

        // dd($request->all());
    }

    public function UploadList(){
        $project = Project::all();
        return view ('admin.upload_list', compact('project'));
    }
}
