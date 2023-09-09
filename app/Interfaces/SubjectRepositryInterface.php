<?php

namespace App\Interfaces;

interface SubjectRepositryInterface
{
    public function index();
    public function show($id);
    public function create();
    public function store($request);
    public function edite($id);
    public function update($request, $id);
    public function destroy($id);
}