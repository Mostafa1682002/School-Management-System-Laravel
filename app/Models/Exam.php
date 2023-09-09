<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Exam extends Model
{
    use HasFactory;
    use HasTranslations;


    protected $fillable = ['exam_name', 'subject_id', 'school_grade_id', 'classe_id', 'term_id', 'academic_year'];
    public $translatable = ['exam_name'];


    public function term()
    {
        return $this->belongsTo(Term::class, 'term_id');
    }
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



    public function questions()
    {
        return $this->hasMany(Question::class, 'exam_id');
    }
}