<?php

namespace App\Repositry;

use App\Interfaces\PromotionRepositryInterface;
use App\Models\Graduated;
use App\Models\Promotion;
use App\Models\SchoolGrade;
use App\Models\Student;
use Exception;
use Illuminate\Support\Facades\DB;

class PromotionRepositry implements PromotionRepositryInterface
{

    public function allPromotion()
    {
        $promotions = Promotion::all();
        return view('Students.Promotions.index', compact('promotions'));
    }

    public function create()
    {
        $grades = SchoolGrade::get();
        return view('Students.Promotions.create', compact('grades'));
    }

    public function storePromotion($request)
    {
        try {
            $students = Student::where('grade_id', $request->from_grade)
                ->where('class_id', $request->from_classe)
                ->where('section_id', $request->from_section)
                ->where('academic_year', $request->from_academic_year)
                ->get();
            // return $request;
            if ($students->count()) {
                foreach ($students as $student) {
                    $student_update = Student::find($student->id);
                    //Student Promotion
                    $student_update->update([
                        "grade_id" => $request->to_grade,
                        "class_id" => $request->to_classe,
                        "section_id" => $request->to_section,
                        "academic_year" => $request->to_academic_year,
                    ]);
                    //Insert Or Update In
                    Promotion::updateOrCreate([
                        'student_id' => $student->id,
                        "from_grade" => $request->from_grade,
                        "from_classe" => $request->from_classe,
                        "from_section" => $request->from_section,
                        "from_academic_year" => $request->from_academic_year,
                        "to_grade" => $request->to_grade,
                        "to_classe" => $request->to_classe,
                        "to_section" => $request->to_section,
                        "to_academic_year" => $request->to_academic_year,
                    ]);
                }
                return redirect()->back()->with('promote', '00');
            } else {
                return redirect()->back()->with('promote_empty', '00');
            }
        } catch (Exception $e) {
            return redirect()->back()->with('error', '00');
        }
    }
    public function graduateStudent($id)
    {
        try {
            $student = Student::findOrFail($id);
            Graduated::create([
                'student_id' => $student->id
            ]);
            $student->delete();
            //Delete Promotion Of This Student
            Promotion::where('student_id', $student->id)->delete();
            return redirect()->back()->with('graduate', '00');
        } catch (Exception $e) {
            return redirect()->back()->with('error', '00');
        }
    }

    public function deletePromotion($id, $stu_id)
    {
        try {
            $promotion = Promotion::findOrFail($id);
            Student::where('id', $stu_id)
                ->where('grade_id', $promotion->to_grade)
                ->where('class_id', $promotion->to_classe)
                ->where('section_id', $promotion->to_section)
                ->where('academic_year', $promotion->to_academic_year)
                ->update([
                    "grade_id" => $promotion->from_grade,
                    "class_id" => $promotion->from_classe,
                    "section_id" => $promotion->from_section,
                    "academic_year" => $promotion->from_academic_year,
                ]);
            $promotion->delete();
            return redirect()->back()->with('returned_prom', '1321');
        } catch (Exception $e) {
            return redirect()->back()->with('error', '1321');
        }
    }
    public function deleteAllPromotion()
    {
        try {
            $promotions = Promotion::get();
            foreach ($promotions as $promotion) {
                Student::where('id', $promotion->student_id)
                    ->where('grade_id', $promotion->to_grade)
                    ->where('class_id', $promotion->to_classe)
                    ->where('section_id', $promotion->to_section)
                    ->where('academic_year', $promotion->to_academic_year)
                    ->update([
                        "grade_id" => $promotion->from_grade,
                        "class_id" => $promotion->from_classe,
                        "section_id" => $promotion->from_section,
                        "academic_year" => $promotion->from_academic_year,
                    ]);
                $promotion->delete();
            }
            DB::table('promotions')->truncate();
            return redirect()->back()->with('returned_prom_all', '1321');
        } catch (Exception $e) {
            return redirect()->back()->with('error', '1321');
        }
    }
}
