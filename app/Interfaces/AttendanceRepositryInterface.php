<?php

namespace App\Interfaces;

interface AttendanceRepositryInterface
{
    public function index();
    public function show($section_id);
    public function store($request);
    public function edit($id);
    public function update($request, $id);
    public function destroy($id);
}