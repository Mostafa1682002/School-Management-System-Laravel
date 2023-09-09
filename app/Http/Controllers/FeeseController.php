<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreFees;
use App\Interfaces\FeesRepositryInterface;
use App\Models\Feese;
use Illuminate\Http\Request;

class FeeseController extends Controller
{

    protected $fees;
    public function __construct(FeesRepositryInterface  $fees)
    {
        $this->fees = $fees;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return $this->fees->index();
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return $this->fees->create();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreFees $request)
    {
        return $this->fees->store($request);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        return $this->fees->edit($id);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreFees $request,  $id)
    {
        return $this->fees->update($request, $id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        return $this->fees->destroy($id);
    }
}
