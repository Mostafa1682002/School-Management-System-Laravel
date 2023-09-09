<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreOnlineClasse;
use App\Interfaces\OnlineClasseRepositryInterface;
use App\Models\OnlineClasse;
use Illuminate\Http\Request;

class OnlineClasseController extends Controller
{
    protected $onlineClasse;
    public function __construct(OnlineClasseRepositryInterface $onlineClasse)
    {
        $this->onlineClasse = $onlineClasse;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return $this->onlineClasse->index();
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return $this->onlineClasse->create();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreOnlineClasse $request)
    {
        return $this->onlineClasse->store($request);
    }

    /**
     * Display the specified resource.
     */
    public function show(OnlineClasse $onlineClasse)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(OnlineClasse $onlineClasse)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, OnlineClasse $onlineClasse)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        return $this->onlineClasse->destroy($id);
    }
}
