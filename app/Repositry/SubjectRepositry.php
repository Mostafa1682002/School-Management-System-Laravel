<?php

namespace App\Repositry;

use App\Interfaces\SubjectRepositryInterface;
use App\Models\SchoolGrade;
use App\Models\Subject;
use App\Models\Teacher;
use Exception;

class SubjectRepositry implements SubjectRepositryInterface
{
    public function index()
    {
        $subjects = Subject::get();
        return view('Subjects.index', compact('subjects'));
    }
    public function show($id)
    {
    }
    public function create()
    {
        $grades = SchoolGrade::get();
        $teachers = Teacher::get();
        return view('Subjects.create', compact('grades', 'teachers'));
    }
    public function store($request)
    {
        try {
            Subject::create([
                'subject_name' => ['ar' => $request->subject_name_ar, 'en' => $request->subject_name_en],
                'school_grade_id' => $request->school_grade_id,
                'classe_id' => $request->classe_id,
                'teacher_id' => $request->teacher_id,
            ]);
            return redirect()->route('subject.index')->with('save', 4);
        } catch (Exception $e) {
            return redirect()->back()->with('error', 4);
        }
    }
    public function edite($id)
    {
        try {
            $subject = Subject::findOrFail($id);
            $grades = SchoolGrade::get();
            $teachers = Teacher::get();
            return view('Subjects.edite', compact('subject', 'grades', 'teachers'));
        } catch (Exception $e) {
            return redirect()->back()->with('error', 4);
        }
    }
    public function update($request, $id)
    {
        try {
            $subject = Subject::findOrFail($id);
            $subject->update([
                'subject_name' => ['ar' => $request->subject_name_ar, 'en' => $request->subject_name_en],
                'school_grade_id' => $request->school_grade_id,
                'classe_id' => $request->classe_id,
                'teacher_id' => $request->teacher_id,
            ]);
            return redirect()->route('subject.index')->with('update', 4);
        } catch (Exception $e) {
            return redirect()->back()->with('error', 4);
        }
    }
    public function destroy($id)
    {
        try {
            $subject = Subject::findOrFail($id);
            $subject->delete();
            return redirect()->route('subject.index')->with('delete', 4);
        } catch (Exception $e) {
            return redirect()->back()->with('error', 4);
        }
    }
}