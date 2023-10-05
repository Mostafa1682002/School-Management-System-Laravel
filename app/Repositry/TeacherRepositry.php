<?php

namespace App\Repositry;

use App\Models\Teacher;
use App\Interfaces\TeacherRepositryInterface;
use Illuminate\Support\Facades\Hash;

class TeacherRepositry implements TeacherRepositryInterface
{
    public function getAllTeachers()
    {
        return Teacher::get();
    }

    public function getTeacher($id)
    {
        return Teacher::findOrFail($id);
    }

    public function storeTeacher($data)
    {
        try {
            Teacher::create([
                'email' => $data->email,
                'password' => Hash::make($data->password),
                'name_teacher' => ['ar' => $data->name_ar, 'en' => $data->name_en],
                "specialization_id" => $data->specialization_id,
                "gender_id" => $data->gender_id,
                "address" => $data->address
            ]);
        } catch (\Exception $e) {
            return redirect()->back()->with('error', '000');
        }
        return redirect()->route('teachers.index')->with('save', '000');
    }


    public function updateTeacher($data, $id)
    {
        try {
            $teacher = Teacher::findOrFail($id);
            $teacher->update([
                'email' => $data->email,

                'password' => Hash::make($data->password),
                'name_teacher' => ['ar' => $data->name_ar, 'en' => $data->name_en],
                "specialization_id" => $data->specialization_id,
                "gender_id" => $data->gender_id,
                "address" => $data->address
            ]);
            return redirect()->route('teachers.index')->with('update', '000');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', '000');
        }

    }



    public function deleteTeacher($id)
    {
        try {
            $teacher = Teacher::findOrFail($id);
            $teacher->delete();
            return redirect()->route('teachers.index')->with('delete', '000');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', '000');
        }

    }
}
