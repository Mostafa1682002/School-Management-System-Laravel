<?php


namespace App\Interfaces;


interface StudentRepositryInterface
{
    public function getAllStudents();
    public function getStudent($id);

    public function createStudent();
    public function storeStudent($data);

    public function updateStudent($data, $id);
    public function editStudent($id);
    public function deleteStudent($id);

    public function storeAttachment($data);
    public function deleteAttachment($id);
}
