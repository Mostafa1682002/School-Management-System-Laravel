<?php

namespace App\Interfaces;

interface  GraduatedRepositryInterface
{
    public function allGraduated();
    public function createGraduated();
    public function storeGraduated($request);
    public function returnGraduated($id);
    public function SoftDeleteStudents($id);
}
