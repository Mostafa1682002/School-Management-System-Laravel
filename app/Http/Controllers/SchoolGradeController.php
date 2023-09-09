<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreGradeSchool;
use App\Models\SchoolGrade;
use Illuminate\Http\Request;

class SchoolGradeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $grades = SchoolGrade::all();
        return view('SchoolGrades.SchoolGrades', compact('grades'));
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
    public function store(StoreGradeSchool $request)
    {
        // if (SchoolGrade::where('name->ar', $request->name)->orwhere('name->en', $request->name_en)->exists()) {
        //     return redirect()->back()->with('exist', 'success');
        // }

        SchoolGrade::create([
            'name' => ['en' => $request->name_en, 'ar' => $request->name],
            'notes' => $request->notes,
        ]);
        return redirect()->back()->with('save', 'success');
    }

    /**
     * Display the specified resource.
     */
    public function show(SchoolGrade $schoolGrade)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(SchoolGrade $schoolGrade)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreGradeSchool $request, $id)
    {
        $grade = SchoolGrade::findOrFail($id);
        if ($grade) {
            $grade->update([
                'name' => ['en' => $request->name_en, 'ar' => $request->name],
                'notes' => $request->notes,
            ]);
            return redirect()->back()->with('update', 'success');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $grade = SchoolGrade::findOrFail($id);
        if (count($grade->classes)) {
            return redirect()->back()->with('depend', 'success');
        } else {
            $grade->delete();
            return redirect()->back()->with('delete', 'success');
        }
    }
}
