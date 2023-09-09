<?php

namespace App\Http\Controllers;

use App\Interfaces\StudentRepositryInterface;
use GuzzleHttp\Psr7\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class StudentAttachmentController extends Controller
{

    protected $student;
    public function __construct(StudentRepositryInterface $student)
    {
        $this->student = $student;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
    public function store(Request $request)
    {
        $request->validate(
            ['photos' => "required", 'student_id' => "required|exists:students,id"],
            [],
            ['photos' => trans('Student_trans.attachments'), 'student_id' => trans('Student_trans.name_student')]
        );
        return $this->student->storeAttachment($request);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        return $this->student->deleteAttachment($id);
    }




    public function downloadStudentAttachment($id, $name)
    {
        $path = "./uploades/student_attachements/$id/$name";
        return Response()->download($path, $name);
    }
}
