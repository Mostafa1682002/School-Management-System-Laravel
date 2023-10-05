<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreSection;
use App\Models\Classe;
use App\Models\SchoolGrade;
use App\Models\Section;
use App\Models\Teacher;
use Illuminate\Http\Request;

class SectionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $teachers = Teacher::all();
        $grades = SchoolGrade::with('classes', 'sections')->get();
        return view('Sections.sections', compact('grades', 'teachers'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreSection $request)
    {
        $section = new  Section();
        $section->section_name = ['ar' => $request->section_name_ar, 'en' => $request->section_name_en];
        $section->school_grade_id = $request->school_grade_id;
        $section->status = 1;
        $section->classe_id = $request->class_id;
        $section->save();
        $section->teachers()->attach($request->teacher_id);
        return redirect()->back()->with('save', '11');
    }

    /**
     * Display the specified resource.
     */
    public function show(Section $section)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Section $section)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreSection $request, $id)
    {
        $section = Section::findOrFail($id);
        $section->section_name = ['ar' => $request->section_name_ar, 'en' => $request->section_name_en];
        $section->school_grade_id = $request->school_grade_id;
        $section->status =  $request->status;
        $section->classe_id = $request->class_id;
        $section->save();
        $section->teachers()->sync($request->teacher_id);
        return redirect()->back()->with('update', '11');
    }

    /**
     * Remove the specified resource from storage.
     */
    public
    function destroy($id)
    {
        $section = Section::findOrFail($id);
        if ($section) {
            $section->delete();
            return redirect()->back()->with('delete', '11');
        }
    }


    /**
     * Get Classes By Ajax.
     */
    public
    function getClass($id)
    {
        $classes = Classe::where('schoolgrade_id', $id)->get()->pluck('id', 'class_name');
        return json_encode($classes);
    }
    public
    function getSections($id)
    {
        $sections = Section::where('classe_id', $id)->get()->pluck('id', 'section_name');
        return json_encode($sections);
    }
}
