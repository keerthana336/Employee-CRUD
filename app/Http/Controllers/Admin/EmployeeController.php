<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Employee;
use Illuminate\Support\Facades\File;

class EmployeeController extends Controller
{
    public function index(){
        $employee = Employee::all();
        return view('employee.index',compact('employee'));
    }

    public function add(){
        return view('employee.addemployee');
    }

    public function insert(Request $request){
        $employee = new Employee();
        if($request->hasFile('profile_image')){
            $file = $request->file('profile_image'); 
            $ext = $file->getClientOriginalExtension();
            $filename = time().'.'.$ext;
            $file->move('uploads/employee',$filename);
            $employee->profile_image = $filename; 
        }
        $employee->name = $request->input('name');
        $employee->email = $request->input('email');
        $employee->employee_id = $request->input('employee_id');
        $employee->gender = $request->input('gender');
        $employee->save();
        return redirect('/list-employee')->with('status','Employee added successfully!');
    }

    public function editemployee($id){
        $employee = Employee::find($id);
        return view('employee.editemployee',compact('employee'));
    }
    
    public function updateemployee(Request $request ,$id){
        $employee = Employee::find($id);
        if($request->hasFile('profile_image')){
            $path = 'uploads/employee/'.$employee->profile_image;
            if(File::exists($path))
            {
                File::delete($path);
            }
            $file = $request->file('profile_image'); 
            $ext = $file->getClientOriginalExtension();
            $filename = time().'.'.$ext;
            $file->move('uploads/employee',$filename);
            $employee->profile_image = $filename; 
        }
        $employee->name = $request->input('name');
        $employee->email = $request->input('email');
        $employee->employee_id = $request->input('employee_id');
        $employee->gender = $request->input('gender');
        $employee->update();
        return redirect('/list-employee')->with('status','employee updated successfully!');

    }

    public function deleteemployee($id){

        $employee = Employee::find($id);
        if($employee->profile_image)
        {
            $path = 'uploads/categories/'.$employee->profile_image;
            if(File::exists($path))
            {
                File::delete($path);
            }
        }
        $employee->delete();
        return redirect('/list-employee')->with('status','employee deleted successfully!');

    }
}
