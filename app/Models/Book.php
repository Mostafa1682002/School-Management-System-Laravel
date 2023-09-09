<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    protected $fillable = [
        'file_name',
        'school_grade_id',
        'classe_id', 'subject_id',
        'term_id', 'academic_year'
    ];



    public function subject()
    {
        return $this->belongsTo(Subject::class, 'subject_id');
    }
    public function grade()
    {
        return $this->belongsTo(SchoolGrade::class, 'school_grade_id');
    }
    public function classe()
    {
        return $this->belongsTo(Classe::class, 'classe_id');
    }
    public function term()
    {
        return $this->belongsTo(Term::class, 'term_id');
    }
}
