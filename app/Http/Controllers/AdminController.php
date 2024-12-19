<?php

namespace App\Http\Controllers;

use App\Models\Departments;
use App\Models\Project;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index(){
        $userCount = \App\Models\User::count();
        $projectCount = \App\Models\Project::count();
        return view('dashboard',compact('userCount','projectCount'));
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
   
        return redirect()->route('project.store')->with('success','Data project berhasil dinput.');

        // dd($request->all());
    }

    public function UploadList(){
        $project = Project::with('user','department')->get();
        return view ('admin.upload_list', compact('project'));
    }

    public function LastSeen(){

        $users = User::orderBy('last_seen','DESC')->get();
        return view('admin.users_list', compact('users'));
    }

    public function ShowEdit($id)
    {
       
        $project = Project::findOrFail($id);
        $departments = Departments::all();
        return view('admin.upload_edit', compact('project', 'departments'));
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
    
       
        return redirect()->route('upload.list')->with('success', 'Data project berhasil diperbarui.');
    }
    

    public function toggleStatus($id)
    {
        try {
            $project = Project::findOrFail($id);
    
            // Toggle status
            $project->status_link = $project->status_link === 'aktif' ? 'nonaktif' : 'aktif';
            $project->save();
    
            return response()->json(['status_link' => $project->status_link], 200);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Gagal mengubah status'], 500);
        }
    }
}
