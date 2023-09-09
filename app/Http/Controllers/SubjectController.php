<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreSubject;
use App\Interfaces\SubjectRepositryInterface;
use App\Models\Subject;
use Illuminate\Http\Request;

class SubjectController extends Controller
{

    protected $subject;
    public function __construct(SubjectRepositryInterface $subject)
    {
        $this->subject = $subject;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return $this->subject->index();
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return $this->subject->create();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreSubject $request)
    {
        return $this->subject->store($request);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        return $this->subject->show($id);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        return $this->subject->edite($id);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreSubject $request, $id)
    {
        return $this->subject->update($request, $id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        return $this->subject->destroy($id);
    }
}