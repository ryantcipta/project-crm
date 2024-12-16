<?php

namespace App\Http\Controllers;

use App\Models\Departments;
use Illuminate\Http\Request;

class DepartmentsController extends Controller
{
    public function index(){
        $departments = Departments::all();
        return view('admin.departments',compact('departments'));
    }

    public function create(){

        return view('departments.create');
    }

    public function store(Request $request){

        $validated = $request->validate([
            'name_departments' => 'required|string|max:255',
            
        ]);
        
        $departments = new Departments();
        $departments->name_departments = $validated['name_departments'];
        $departments->save();


        // Project::create($request->all());
   
        return redirect()->route('departments')->with('success','Data Departments berhasil dinput.');

        // dd($request->all());
    }

    public function edit($id){

        $departments = Departments::findOrFail($id);
        return view('departments.edit', compact('departments'));
    }

    public function update(Request $request, $id){

        $validated = $request->validate([
            'name_departments' => 'required|string|max:255',
        ]);
    
      
        $departments = Departments::findOrFail($id);
    
        $departments->name_departments = $validated['name_departments'];
        $departments->save();
    
       
        return redirect()->route('departments')->with('success', 'Data Departments berhasil diperbarui.');

    }

    public function destroy($id)
        {
            try {
                $departments = Departments::findOrFail($id);
                $departments->delete();

                return redirect()->route('departments')->with('success', 'Data Department berhasil dihapus.');
            } catch (\Exception $e) {
                return redirect()->route('departments')->withErrors('Terjadi kesalahan saat menghapus data.');
            }
        }

}
