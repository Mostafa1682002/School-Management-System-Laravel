<?php

namespace App\Http\Controllers;

use App\Interfaces\AttendanceRepositryInterface;
use Illuminate\Http\Request;

class AttendanceController extends Controller
{

    public $Attendance;

    public function __construct(AttendanceRepositryInterface $attendance)
    {
        $this->Attendance = $attendance;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return $this->Attendance->index();
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        return $this->Attendance->store($request);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        return $this->Attendance->show($id);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        return $this->Attendance->edit($id);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        return $this->Attendance->update($request, $id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        return $this->Attendance->destroy($id);
    }
}