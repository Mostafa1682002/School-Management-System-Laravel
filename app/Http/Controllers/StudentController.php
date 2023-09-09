<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreStudent;
use App\Models\Student;
use App\Models\StudentAttachment;
use App\Repositry\StudentRepositry;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    protected $student;
    public function __construct(StudentRepositry $student)
    {
        $this->student = $student;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $students = $this->student->getAllStudents();
        return view('Students.index', compact('students'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return $this->student->createStudent();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreStudent $request)
    {
        return $this->student->storeStudent($request);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $student = $this->student->getStudent($id);
        $attachments = StudentAttachment::where('student_id', $id)->get();
        return view('Students.show', compact('student', 'attachments'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        return $this->student->editStudent($id);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreStudent $request, $id)
    {
        return $this->student->updateStudent($request, $id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        return $this->student->deleteStudent($id);
    }
}
