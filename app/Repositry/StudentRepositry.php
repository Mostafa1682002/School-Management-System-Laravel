<?php

namespace App\Repositry;

use App\Interfaces\StudentRepositryInterface;
use App\Models\Classe;
use App\Models\Gender;
use App\Models\Myparent;
use App\Models\Nationality;
use App\Models\SchoolGrade;
use App\Models\Student;
use App\Models\StudentAttachment;
use App\Models\Type_Blood;
use Exception;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class StudentRepositry implements StudentRepositryInterface
{

    public function getAllStudents()
    {
        return Student::get();
    }


    public function getStudent($id)
    {
        return Student::findOrFail($id);
    }

    public function createStudent()
    {
        $grades = SchoolGrade::all();
        $classes = Classe::get();
        $genders = Gender::get();
        $nationalites = Nationality::get();
        $parents = Myparent::get();
        $type_bloods = Type_Blood::get();
        return view(
            'Students.create',
            compact('grades', 'classes', 'genders', 'nationalites', 'parents', 'type_bloods')
        );
    }



    public function storeStudent($data)
    {
        try {
            Student::create([
                "student_name" => ['ar' => $data->name_ar, 'en' => $data->name_en],
                "email" => $data->email,
                "password" => Hash::make($data->password),
                "gender_id" => $data->gender_id,
                "nationalitie_id" => $data->nationalitie_id,
                "blood_id" => $data->blood_id,
                "date_birth" => $data->date_birth,
                "grade_id" => $data->grade_id,
                "class_id" => $data->class_id,
                "section_id" => $data->section_id,
                "parent_id" => $data->parent_id,
                "academic_year" => $data->academic_year,
            ]);
            $student_id = Student::latest()->first()->id;
            if ($data->hasFile('photos')) {
                $attachements = $data->file('photos');
                foreach ($attachements as $attachement) {
                    $attachement->storeAs($student_id, $attachement->getClientOriginalName(), 'student_attachemnt');
                    StudentAttachment::create([
                        'name_file' => $attachement->getClientOriginalName(),
                        'student_id' => $student_id,
                    ]);
                }
            }

            return redirect()->route('student.index')->with('save', '111');
        } catch (Exception $e) {
            return redirect()->back()->with('error', '111');
        }
    }

    public function editStudent($id)
    {
        $student = Student::findOrFail($id);
        $grades = SchoolGrade::all();
        $classes = Classe::get();
        $genders = Gender::get();
        $nationalites = Nationality::get();
        $parents = Myparent::get();
        $type_bloods = Type_Blood::get();
        return view(
            'Students.edit',
            compact('student', 'grades', 'classes', 'genders', 'nationalites', 'parents', 'type_bloods')
        );
    }


    public function updateStudent($data, $id)
    {
        try {
            $student_edite = Student::findOrFail($id);
            $student_edite->update([
                "student_name" => ['ar' => $data->name_ar, 'en' => $data->name_en],
                "email" => $data->email,
                // "password" => Hash::make($data->password),
                "gender_id" => $data->gender_id,
                "nationalitie_id" => $data->nationalitie_id,
                "blood_id" => $data->blood_id,
                "date_birth" => $data->date_birth,
                "grade_id" => $data->grade_id,
                "class_id" => $data->class_id,
                "section_id" => $data->section_id,
                "parent_id" => $data->parent_id,
                "academic_year" => $data->academic_year,
            ]);
            return redirect()->route('student.index')->with('update', '111');
        } catch (Exception $e) {
            return redirect()->back()->with('error', '111');
        }
    }

    public function deleteStudent($id)
    {
        $student = Student::findOrFail($id);
        $student->forceDelete();
        Storage::disk('student_attachemnt')->deleteDirectory("$id");
        return redirect()->back()->with('delete', '111');
        try {
        } catch (Exception $e) {
            return redirect()->back()->with('error', '111');
        }
    }



    public function storeAttachment($data)
    {
        try {
            $attachements = $data->file('photos');
            foreach ($attachements as $attachement) {
                $attachement->storeAs($data->student_id, $attachement->getClientOriginalName(), 'student_attachemnt');
                StudentAttachment::create([
                    'name_file' => $attachement->getClientOriginalName(),
                    'student_id' => $data->student_id,
                ]);
            }
            return redirect()->back()->with('save', '111');
        } catch (Exception $e) {
            return redirect()->back()->with('error', '111');
        }
    }



    public function deleteAttachment($id)
    {
        try {
            $attch = StudentAttachment::findOrFail($id);
            $name_attach = $attch->name_file;
            $id_stu = $attch->student->id;
            $attch->delete();
            Storage::disk('student_attachemnt')->delete("$id_stu/$name_attach");
            return redirect()->back()->with('delete', '111');
        } catch (Exception $e) {
            return redirect()->back()->with('error', '111');
        }
    }
}
