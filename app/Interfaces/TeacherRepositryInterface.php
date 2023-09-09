<?php

namespace  App\Interfaces;

interface TeacherRepositryInterface
{
    public function getAllTeachers();
    public function getTeacher($id);
    public function storeTeacher($data);
    public function updateTeacher($data,$id);
    public function deleteTeacher($id);
}
