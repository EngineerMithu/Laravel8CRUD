<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
class StudentController extends Controller
{
    public function index(){
        $students= Student::orderBy('id','DESC')->get();
        return view('crud',compact('students'));
    }

    //-------------- Store data---------------
    public function store(Request $request){
        $request->validate([
            'name' => 'required',
            'class' => 'required',
            'roll' => 'required',
        ],[
            'name.required' => 'please enter your name',
            'class.required' => 'please enter your class',
            'roll.required' => 'please enter your roll'
        ]);

        Student::insert([
            'name'=>$request->name,
            'class'=>$request->class,
            'roll'=>$request->roll,
        ]);
            return redirect()->back()->with('success','Successfully Data Added');

    }
    //-------------- Edit data---------------
    public function edit($id){
        $students = Student ::findOrFail($id);
        return view('edit',compact('students'));
    }
    //-------------- Update data---------------
    function update(Request $request,$id){
       Student ::findOrFail($id)->update([
            'name'=>$request->name,
            'class'=>$request->class,
            'roll'=>$request->roll,
        ]);
            return redirect()->to('/crud')->with('update','Successfully Data Updated');

    }
    //-------------- Delete data---------------
    public function delete($id){
        Student::findOrFail($id)->delete();
        return redirect()->back()->with('delete','Successfully Data deleted');
    }

}


