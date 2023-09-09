<?php

namespace App\Http\Controllers;

use App\Interfaces\GraduatedRepositryInterface;
use App\Models\Graduated;
use Illuminate\Http\Request;

class GraduatedController extends Controller
{
    public $graduate;
    public function __construct(GraduatedRepositryInterface $graduate)
    {
        $this->graduate = $graduate;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return $this->graduate->allGraduated();
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return $this->graduate->createGraduated();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        return $this->graduate->storeGraduated($request);
    }

    /**
     * Display the specified resource.
     */
    public function show(Graduated $graduated)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Graduated $graduated)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        return $this->graduate->returnGraduated($id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        return $this->graduate->SoftDeleteStudents($id);
    }
}
