<?php

namespace App\Repositry;

use App\Interfaces\OnlineClasseRepositryInterface;
use App\Models\OnlineClasse;
use App\Models\SchoolGrade;
use Exception;

class OnlineClasseRepositry implements OnlineClasseRepositryInterface
{
    public function index()
    {
        $onlineClasses = OnlineClasse::get();
        return view('OnlineClasses.index', compact('onlineClasses'));
    }
    public function show($id)
    {
    }
    public function create()
    {
        $grades = SchoolGrade::get();
        return view('OnlineClasses.create', compact('grades'));
    }
    public function store($request)
    {
        try {
            OnlineClasse::create([
                'topic' => $request->topic,
                'school_grade_id' => $request->school_grade_id,
                'classe_id' => $request->classe_id,
                'section_id' => $request->section_id,
                'subject_id' => $request->subject_id,
                'start_time' => $request->start_time,
                'start_url' => $request->start_url,
                'join_url' => $request->join_url,
            ]);
            return redirect()->route('online-classes.index')->with('save', 12);
        } catch (Exception $e) {
            return redirect()->back()->with('error', 12);
        }
    }
    public function edite($id)
    {
    }
    public function update($request, $id)
    {
    }
    public function destroy($id)
    {
        try {
            $cl = OnlineClasse::findOrFail($id);
            $cl->delete();
            return redirect()->route('online-classes.index')->with('delete', 12);
        } catch (Exception $e) {
            return redirect()->back()->with('error', 12);
        }
    }
}
