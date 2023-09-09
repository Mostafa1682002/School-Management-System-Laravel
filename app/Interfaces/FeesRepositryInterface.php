<?php

namespace App\Interfaces;

interface FeesRepositryInterface
{
    public function index();
    public function create();
    public function store($request);
    public function edit($id);
    public function update($request, $id);
    public function destroy($id);
}
