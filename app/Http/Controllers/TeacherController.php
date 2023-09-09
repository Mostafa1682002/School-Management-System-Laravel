<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTeacher;
use App\Models\Gender;
use App\Models\Specialization;
use App\Models\Teacher;
use Illuminate\Http\Request;
use App\Repositry\TeacherRepositry;
use Illuminate\Support\Facades\Hash;

class TeacherController extends Controller
{
    public $teacher;

    public function __construct(TeacherRepositry $teacher)
    {
        $this->teacher = $teacher;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $teachers = $this->teacher->getAllTeachers();

        return view('Teachers.teachers', compact('teachers'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $genders = Gender::get();
        $specializations = Specialization::all();
        return view('Teachers.create', compact('genders', 'specializations'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTeacher $request)
    {
        return $this->teacher->storeTeacher($request);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        return $this->teacher->getTeacher($id);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $genders = Gender::get();
        $specializations = Specialization::all();
        $teacher = $this->teacher->getTeacher($id);
        return view('Teachers.edite', compact('teacher', 'genders', 'specializations'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreTeacher $request, $id)
    {
        return $this->teacher->updateTeacher($request, $id);
    }


    /**
     * Remove the specified resource from storage.
     */
    public
    function destroy($id)
    {
        return $this->teacher->deleteTeacher($id);
    }
}
