<?php

namespace App\Repositry;

use App\Interfaces\FeesRepositryInterface;
use App\Models\Feese;
use App\Models\SchoolGrade;
use Exception;

class FeesRepositry implements FeesRepositryInterface
{
    public function index()
    {
        $feeses = Feese::all();
        return view('Fees.index', compact('feeses'));
    }
    public function create()
    {
        $grades = SchoolGrade::all();
        return view('Fees.create', compact('grades'));
    }
    public function store($request)
    {
        try {
            // return $request;
            Feese::create([
                'name_fees' => ['ar' => $request->name_ar, 'en' => $request->name_en],
                'amount' => $request->amount,
                'school_grade_id' => $request->school_grade_id,
                'classe_id' => $request->classe_id,
                'academic_year' => $request->academic_year,
                "fees_type" => $request->fees_type,
                'notes' => $request->notes,
            ]);
            return redirect()->route('feese.index')->with('save', '44');
        } catch (Exception $e) {
            return redirect()->back()->with('error', '44');
        }
    }

    public function edit($id)
    {
        try {
            $feese = Feese::findOrFail($id);
            $grades = SchoolGrade::all();
            return view('Fees.edite', compact('feese', 'grades'));
        } catch (Exception $e) {
            return redirect()->back()->with('error', trans('Fees_trans.notfound'));
        }
    }


    public function update($request, $id)
    {
        try {
            $feese = Feese::findOrFail($id);
            $feese->update([
                'name_fees' => ['ar' => $request->name_ar, 'en' => $request->name_en],
                'amount' => $request->amount,
                'school_grade_id' => $request->school_grade_id,
                'classe_id' => $request->classe_id,
                'academic_year' => $request->academic_year,
                "fees_type" => $request->fees_type,
                'notes' => $request->notes,
            ]);
            return redirect()->route('feese.index')->with('update', '44');
        } catch (Exception $e) {
            return redirect()->back()->with('error', trans('Fees_trans.notfound'));
        }
    }


    public function destroy($id)
    {
        try {
            $feese = Feese::findOrFail($id);
            $feese->delete();
            return redirect()->route('feese.index')->with('delete', '44');
        } catch (Exception $e) {
            return redirect()->back()->with('error', trans('Fees_trans.notfound'));
        }
    }
}
