<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreQuestion;
use App\Interfaces\QuestionRepositryInterface;
use App\Models\Question;
use Illuminate\Http\Request;

class QuestionController extends Controller
{


    protected $question;

    public function __construct(QuestionRepositryInterface $question)
    {
        $this->question = $question;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return $this->question->index();
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return $this->question->create();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreQuestion $request)
    {
        return $this->question->store($request);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        return $this->question->show($id);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        return $this->question->edite($id);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreQuestion $request, $id)
    {
        return $this->question->update($request, $id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        return $this->question->destroy($id);
    }
}