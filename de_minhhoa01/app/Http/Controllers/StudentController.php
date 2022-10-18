<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function get_all_student()
    {
        $students = Student::all(); //fetch all students from DB
        return view('student.student_manage', ['students' => $students]);
    }

    public function get_student_by_id($id) {
        $student = Student::find($id);
        return view("student.student_edit",["student" =>$student]);
    }

    public function edit(Request $request,$id) {
        $student = Student::find($id);
        $student->update(["fullname" =>$request->fullname,"birthday"=>$request->birthday,"address" => $request->address ]);
        return redirect("/");
    }
}
