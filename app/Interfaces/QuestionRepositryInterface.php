<?php

namespace App\Interfaces;

interface QuestionRepositryInterface
{
    public function index();
    public function show($exam_id);
    public function create();
    public function store($request);
    public function edite($id);
    public function update($request, $id);
    public function destroy($id);
}