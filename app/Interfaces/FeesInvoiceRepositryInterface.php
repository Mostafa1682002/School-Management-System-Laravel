<?php

namespace App\Interfaces;

interface FeesInvoiceRepositryInterface
{
    public function index();
    public function show($student_id);
    public function store($request);
    public function edit($id);
    public function update($request, $id);
    public function destroy($id);
}
