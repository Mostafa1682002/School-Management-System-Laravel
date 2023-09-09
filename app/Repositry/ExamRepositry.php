<?php

namespace App\Repositry;

use App\Interfaces\ExamRepositryInterface;
use App\Models\Exam;
use App\Models\SchoolGrade;
use App\Models\Term;
use Exception;

class ExamRepositry implements ExamRepositryInterface
{
    public function index()
    {
        $exams = Exam::get();
        return view('Exams.index', compact('exams'));
    }
    public function show($id)
    {
    }
    public function create()
    {
        $grades = SchoolGrade::get();
        $terms = Term::get();
        return view('Exams.create', compact('grades', 'terms'));
    }
    public function store($request)
    {
        try {
            Exam::create([
                "exam_name" => ['ar' => $request->exam_name_ar, 'en' => $request->exam_name_en],
                "school_grade_id" => $request->school_grade_id,
                "classe_id" => $request->classe_id,
                "subject_id" => $request->subject_id,
                "academic_year" => $request->academic_year,
                "term_id" => $request->term_id,
            ]);
            return redirect()->route('exam.index')->with('save', 21);
        } catch (Exception $e) {
            return redirect()->back()->with('error', 21);
        }
        return $request;
    }
    public function edite($id)
    {
        try {
            $exam = Exam::findOrFail($id);
            $grades = SchoolGrade::get();
            $terms = Term::get();
            return view('Exams.edite', compact('exam', 'grades', 'terms'));
        } catch (Exception $e) {
            return redirect()->back()->with('error', 21);
        }
    }
    public function update($request, $id)
    {
        try {
            $exam = Exam::findOrFail($id);
            $exam->update([
                "exam_name" => ['ar' => $request->exam_name_ar, 'en' => $request->exam_name_en],
                "school_grade_id" => $request->school_grade_id,
                "classe_id" => $request->classe_id,
                "subject_id" => $request->subject_id,
                "academic_year" => $request->academic_year,
                "term_id" => $request->term_id,
            ]);
            return redirect()->route('exam.index')->with('update', 21);
        } catch (Exception $e) {
            return redirect()->back()->with('error', 21);
        }
    }
    public function destroy($id)
    {
        try {
            $exam = Exam::findOrFail($id);
            $exam->delete();
            return redirect()->route('exam.index')->with('delete', 21);
        } catch (Exception $e) {
            return redirect()->back()->with('error', 21);
        }
    }
}