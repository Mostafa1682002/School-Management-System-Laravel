<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreExam;
use App\Interfaces\ExamRepositryInterface;
use App\Models\Exam;
use App\Models\Subject;
use Illuminate\Http\Request;

class ExamController extends Controller
{

    protected $exam;

    public function __construct(ExamRepositryInterface $exam)
    {
        $this->exam = $exam;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return $this->exam->index();
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return $this->exam->create();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreExam $request)
    {
        return $this->exam->store($request);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        return $this->exam->show($id);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        return $this->exam->edite($id);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreExam $request, $id)
    {
        return $this->exam->update($request, $id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        return $this->exam->destroy($id);
    }




    public function getsubject($id)
    {
        $subjects = Subject::where('classe_id', $id)->get()->pluck('id', 'subject_name');
        return json_encode($subjects);
    }
}
