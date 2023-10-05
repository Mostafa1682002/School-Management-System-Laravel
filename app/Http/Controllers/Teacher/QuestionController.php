<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreQuestion;
use App\Models\Exam;
use App\Models\Question;
use Illuminate\Http\Request;

class QuestionController extends Controller
{

    public function show($exam_id)
    {
        $exam = Exam::where('id', $exam_id)->with('questions')->first();
        return view('Teachers.pages.Questions.show', compact('exam'));
    }

    public function create($exam_id)
    {
        $exam = Exam::findOrFail($exam_id);
        return view('Teachers.pages.Questions.create', compact('exam'));
    }

    public function store(StoreQuestion $request)
    {
        try {
            Question::create([
                'question_title' => $request->question_title,
                'answers' => $request->answers,
                'right_answer' => $request->right_answer,
                'question_type' => $request->question_type,
                'question_score' => $request->question_score,
                'exam_id' => $request->exam_id
            ]);
            return redirect()->back()->with('save', 54);
        } catch (Exception $e) {
            return redirect()->back()->with('error', 54);
        }
    }
    public function edite($id)
    {
        try {
            $question = Question::findOrFail($id);
            $exam = Exam::findOrFail($question->id);
            return view('Teachers.pages.Questions.edite', compact('exam', 'question'));
        } catch (Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }
    public function update(StoreQuestion $request, $id)
    {
        try {
            $question = Question::findOrFail($id);
            $question->update([
                'question_title' => $request->question_title,
                'answers' => $request->answers,
                'right_answer' => $request->right_answer,
                'question_type' => $request->question_type,
                'question_score' => $request->question_score,
                'exam_id' => $request->exam_id
            ]);
            return redirect()->route('teacher.questions.show', $request->exam_id)->with('update', 54);
        } catch (Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }
    public function destroy($id)
    {
        try {
            $question = Question::findOrFail($id);
            $question->delete();
            return redirect()->back()->with('delete', 54);
        } catch (Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }
}
