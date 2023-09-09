<?php

namespace App\Repositry;

use App\Interfaces\AttendanceRepositryInterface;
use App\Models\Attendance;
use App\Models\SchoolGrade;
use App\Models\Section;
use App\Models\Teacher;

class AttendanceRepositry implements AttendanceRepositryInterface
{
    public function index()
    {
        $teachers = Teacher::get();
        $grades = SchoolGrade::with('sections', 'classes')->get();
        return view('Attendances.index', compact('grades', 'teachers'));
    }
    public function show($section_id)
    {
        $section = Section::with('students')->where('id', $section_id)->first();
        return view('Attendances.attendance', compact('section'));
    }
    public function store($request)
    {
        if (isset($request->attendences)) {
            foreach ($request->attendences as $key => $value) {
                if ($value == "presence") {
                    $attendence_status = 1;
                } else {
                    $attendence_status = 0;
                }
                Attendance::create([
                    'student_id' => $key,
                    'attendence_status' =>  $attendence_status,
                    'attendence_date' => date('Y-m-d')
                ]);
            }
            return redirect()->back()->with('save', '55');
        } else {
            return redirect()->back()->with('not_attendance', '231');
        }
    }
    public function edit($id)
    {
    }
    public function update($request, $id)
    {
    }
    public function destroy($id)
    {
    }
}