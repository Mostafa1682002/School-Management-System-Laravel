<?php

namespace App\Repositry;

use App\Interfaces\GraduatedRepositryInterface;
use App\Models\Graduated;
use App\Models\Promotion;
use App\Models\SchoolGrade;
use App\Models\Student;
use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class GraduatedRepositry implements GraduatedRepositryInterface
{
    public  function  allGraduated()
    {
        $graduates = Graduated::get();
        return view('Students.Graduates.index', compact('graduates'));
    }


    public  function  createGraduated()
    {
        $grades = SchoolGrade::get();
        return view('Students.Graduates.create', compact('grades'));
    }



    public  function storeGraduated($request)
    {
        try {
            $students = Student::where('grade_id', $request->grade)
                ->where('class_id', $request->classe)
                ->where('section_id', $request->section)
                ->get();
            if ($students->count()) {
                foreach ($students as $student) {
                    Graduated::create([
                        'student_id' => $student->id
                    ]);
                    $student_delete = Student::findOrFail($student->id);
                    $student_delete->delete();
                    //Delete Promotion Of This Student
                    Promotion::where('student_id', $student->id)->delete();
                }
                return redirect()->back()->with('graduate', '00');
            } else {
                return redirect()->back()->with('promote_empty', '00');
            }
        } catch (Exception $e) {
            return redirect()->back()->with('error', '00');
        }
    }


    public function returnGraduated($id)
    {
        try {
            $graduate = Graduated::findOrFail($id);
            //Return In Student Table
            Student::where('id', $graduate->student_id)->withTrashed()->restore();
            //Delete In Graduate Table
            $graduate->delete();
            return redirect()->back()->with('returned_graduted', '11');
        } catch (Exception $e) {
            return redirect()->back()->with('error', '11');
        }
    }


    public function SoftDeleteStudents($id)
    {
        $student = Student::withTrashed()->findOrFail($id);
        $student->forceDelete();
        Storage::disk('student_attachemnt')->deleteDirectory("$id");
        return redirect()->back()->with('delete', '111');
        try {
        } catch (Exception $e) {
            return redirect()->back()->with('error', '111');
        }
    }
}
