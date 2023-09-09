<?php

namespace App\Repositry;

use App\Interfaces\QuestionRepositryInterface;
use App\Models\Exam;
use App\Models\Question;
use Exception;

class QuestionRepositry implements QuestionRepositryInterface
{
    public function index()
    {
    }
    public function show($exam_id)
    {
        $exam = Exam::where('id', $exam_id)->with('questions')->first();
        return view('Questions.show', compact('exam'));
    }
    public function create()
    {
        $exams = Exam::get();
        return view('Questions.create', compact('exams'));
    }
    public function store($request)
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
            $exams = Exam::get();
            $question = Question::findOrFail($id);
            return view('Questions.edite', compact('exams', 'question'));
        } catch (Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }
    public function update($request, $id)
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
            return redirect()->route('questions.show', $request->exam_id)->with('update', 54);
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