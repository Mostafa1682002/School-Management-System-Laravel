<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreClasse;
use App\Models\Classe;
use App\Models\SchoolGrade;
use Illuminate\Http\Request;

class ClasseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $grades = SchoolGrade::get();
        $classes = Classe::get();
        $active = 0;
        foreach ($grades as $grade) {
            if (isset($_GET['filter']) && $_GET['filter'] == $grade->id) {
                $classes = Classe::where('schoolgrade_id', "$grade->id")->get();
                $active = $grade->id;
            }
        }
        return view('Classes.classes', compact('classes', 'grades', 'active'));
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
    public function store(StoreClasse $request)
    {
        $List_classes = $request->List_classes;
        foreach ($List_classes as $class) {
            Classe::create([
                'class_name' => ['ar' => $class['class_name'], "en" => $class['class_name_en']],
                'schoolgrade_id' => $class['shoolgarde_id']
            ]);
        }
        return redirect()->route('classes.index')->with('save', 'sss');
    }

    /**
     * Display the specified resource.
     */
    public function show(Classe $classe)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Classe $classe)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreClasse $request, $id)
    {
        $List_classes = $request->List_classes[0];
        $classe = Classe::findOrFail($id);
        $classe->update([
            'class_name' => ['ar' => $List_classes['class_name'], 'en' => $List_classes['class_name_en']],
            'schoolgrade_id' => $List_classes['shoolgarde_id']
        ]);
        return redirect()->route('classes.index')->with('update', '111');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $classe = Classe::findOrFail($id);
        if ($classe) {
            $classe->delete();
            return redirect()->route('classes.index')->with('delete', '111');
        }
    }

    public function deleteSelect(Request $request)
    {
        if (!empty($request->ids)) {
            $ids = explode(',', $request->ids);
            foreach ($ids as $id) {
                Classe::find($id)->delete();
            }
            return redirect()->route('classes.index')->with('delete', '111');
        }
        return redirect()->route('classes.index')->with('notSelect', '111');
    }
}
