<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use App\Http\Controllers\StudentController;

class StudentController extends Controller
{

	public function index(){
		$student = Student::all();
		return response()->json(['student'=>$student],200);
	}

	public function show($id){
		$student=Student::find($id);
		if ($student) {
			return response()->json(['student'=>$student],200);
		}
		else{
			return response()->json(['message'=>'No data found...'],404);
		}
	}


//--------Insert Method started-----
	a
    public function store(Request $request){

    	$request->validate([
    		'name'=>'required',
    		'course'=>'required'
    	]);


    	$student = new Student;

    	$student->name = $request->name;
    	$student->course = $request->course;

    	$student->save();
    	return response()->json(['message'=>'Student Added Successfully...'],200);
    }

    //-----Update Function start---

    public function update(Request $request ,$id){
    	$request->validate([
    		'name'=>'required',
    		'course'=>'required'
    	]);

    	$student =Student::find($id);

    	if ($student) {
	    	$student->name = $request->name;
	    	$student->course = $request->course;

	    	$student->update();
	    	return response()->json(['message'=>'Student Updated Successfully...'],200);
	    	}

	    else{
	    	return response()->json(['message'=>'Student Not Found'],404);
	    }

    }

//-----Delete method started----

    public function delete($id){
    	$student = Student::find($id);

    	if ($student) {
    		$student=delete();
    		return response()->json(['message'=>'Student deleted Successfully....']);
    	}
    	else{
    		return response()->json(['message' =>'Student not found to delete..']);
    	}
    }
}
